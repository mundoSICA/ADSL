#!/bin/bash
#Descripcion: actualiza las rutas del proyecto.
#                           _           _
# _ __ ___  _   _ _ __   __| | ___  ___(_) ___ __ _   ___ ___  _ __ ___
#| '_ ` _ \| | | | '_ \ / _` |/ _ \/ __| |/ __/ _` | / __/ _ \| '_ ` _ \
#| | | | | | |_| | | | | (_| | (_) \__ \ | (_| (_| || (_| (_) | | | | | |
#|_| |_| |_|\__,_|_| |_|\__,_|\___/|___/_|\___\__,_(_)___\___/|_| |_| |_|
#
#
#
##########################################################################################
cyan='\e[0;36m'
light='\e[1;36m'
red="\e[0;31m"
yellow="\e[0;33m"
white="\e[0;37m"
NC='\e[0m'

##########################################################################################
# Validación previa existencia de la carpeta app                                         #
##########################################################################################
export REPO_PATH=$(readlink -f "$0" | sed 's/\/scripts_sica\/actualizar_app.sh//')
export APP="${REPO_PATH}/app"
if [ ! -d "${APP}" ]
then
	echo 'Falta la carpeta de la aplicación, revise que exista el directorio';
	echo "${APP}";
	exit 0;
fi

##########################################################################################
#     Validación si existe el archivo de configuracion                                   #
##########################################################################################
export F_CONFIG="${REPO_PATH}/scripts_sica/configuracion.conf";
if [ ! -e "${F_CONFIG}" ]
then
	echo 'Falta el archivo de configuración';
	echo 'copie el archivo configuracion.conf.ejemplo por configuracion.conf';
	echo "${F_CONFIG}";
	exit 0;
fi
##########################################################################################
#   Actualiza la estructura de archivos realizando comprobacion md5                      #
##########################################################################################
function extractConfig()
{
	echo `cat "${F_CONFIG}" | grep -Ev '^\s*#' | grep -E "\s*${1}=" | sed "s/${1}=//"`
}
export APP_DST=`extractConfig APP_DST`
export MYSQL_CLIENT=`extractConfig MYSQL_CLIENT`

##########################################################################################
# Actualiza la estructura de archivos realizando comprobacion md5                        #
##########################################################################################
function actualizar_path()
{
	for file in `find "${APP}"`
	do
		echo "${file}" | grep -q -v "/app/"  && { continue; }
		file_name=`echo $file | sed 's/^.*\/app\///'`
		file="${APP}/${file_name}"
		if [ ! -d "${file}" ]
		then
			file_dst="${APP_DST}/${file_name}"
			path_dst=`echo "${file_dst}" | sed -r 's/[^\/]*$//'`
			#Si el archivo destino no existe lo creamos.
			if [ ! -e "${file_dst}" ]
			then
				echo -e "Encontrando nuevo archivo: ${yellow}${file_dst}${NC} no existe"
				#si la carpeta destino no existe la creamos.
				if [ ! -e "${path_dst}" ]
				then
					echo -e "Creando Directorio${yellow}${path_dst}${NC}"
					mkdir -p "${path_dst}"
				fi
				cp "${file}" "${file_dst}";
				continue
			fi
			checkSum=`md5sum "${file}" | awk '{print $1}'`
			checkSum2=`md5sum "${file_dst}" | awk '{print $1}'`
			if [ "${checkSum}" != "${checkSum2}" ]
			then
				echo -e "${cyan}${file}${NC} ${red}->${NC}\n\t${yellow}${file_dst}${NC}";
				cp -f "${file}" "${file_dst}";
			fi
		fi
	done
	echo 'Dando permisos de escritura carpeta tmp'
	chmod 777 "${APP_DST}/tmp" -R --silent
}
##########################################################################################
# Actualización rapida solo cambia los archivos indicados por el `git status`            #
##########################################################################################
function actualiza_work_path()
{
	echo -e "${red}Actulizando corrent path(OJO actulización no segura)${NC}"
	for f in `git status "${APP}" | grep -o 'modified:.*' | sed -r 's/^modified:\s+//g' | sort -u`
	do
		f_dst=`echo "${APP_DST}/${f}" | sed -r 's/app\/app\//app\//'`;
		echo -e ${yellow}"${f}"${NC}"${light}->${NC}"${f_dst};
		cp -f  "${f}" "${f_dst}";
	done;
}
##########################################################################################
# Extrae un parametros del archivo de configuración de la base de datos                  #
##########################################################################################
function extractParamBD()
{
	cat "${APP}/Config/database.php" | grep -o "$1'.*=>.*'.*'" | sed -re "s/.*=>\s*//g;s/'//g" | head -1
}
##########################################################################################
# Descricipcion: Borra todas las tablas de una BD MySQL                                  #
# link: http://bash.cyberciti.biz/mysql/drop-all-tables-shell-script/                    #
##########################################################################################
function delete_all_tables()
{
	login=`extractParamBD 'login'`
	password=`extractParamBD 'password'`
	database=`extractParamBD 'database'`
	for t in `${MYSQL_CLIENT} -u ${login} -p${password} ${database} -BNe 'show tables'`
	do
		echo -e "${red}Borrando${NC} -> ${database}${yellow}.${NC}${light}${t}${NC}\t"
		${MYSQL_CLIENT} -u ${login} -p${password} -h localhost ${database} -e "drop table ${t}"
	done
}
##########################################################################################
#      Actualiza la base de datos                                                        #
##########################################################################################
function update_db()
{
	echo 'actulizando BD'
	if ! [ -d "${APP}/Config/Schema/db" ]
	then
		echo -e "${red}Creando la carpeta${NC} ${light}${APP}/Config/Schema/db${NC}"
		mkdir -p "${APP}/Config/Schema/db"
	fi
	#generando los diagramas dinamicamente
	diagrama="${REPO_PATH}/docs/diagramas/db.dia"
	#if [ -f "${diagrama}" ]
	if [ -f "${diagrama}" ]
	then
		dia "${diagrama}" -e "${APP}/Config/Schema/db/01-schema.sql"
		dia "${diagrama}" -e "${APP}/Config/Schema/db/01-schema.js"
		dia "${diagrama}" -e "${REPO_PATH}/docs/diagramas/db.png"
	else
		echo -e "${red}diagrama no encontrado ${diagrama}${NC}"
		exit
	fi
	#Borramos todas las tablas presentes en la base de datos
	delete_all_tables
	#Extraemos los parametros de la BD en cuestion
	login=`extractParamBD 'login'`
	password=`extractParamBD 'password'`
	database=`extractParamBD 'database'`
	#cargamos cada documento sql en config/shema/db
	echo -e "${yellow}Cargando datos...${NC}";
	for f in `find "${APP}/Config/Schema/db" -iregex ".*\.sql" | sort`
	do
		echo "$f" | grep -q -vE ".sql$"  && { continue; }
		f=`echo $f | sed 's/^.*\//Config\/Schema\/db\//'`
		echo -e "${light}mysql ${database} < ${APP}/${f}${NC}";
		${MYSQL_CLIENT} --default-character-set=utf8 -u ${login} -p${password} -h localhost ${database} < "${APP}/${f}";
	done;
}
##########################################################################################
#     unicia y/o detiene el servidor de producción                                       #
##########################################################################################
function iniciar_parar_servidor()
{
	if [ "${UID}" -ne 0 ];
	then
		echo -e "${red}Se requiere de permisos de super usuario${NC}"
	exit
	fi
	APACHE='/etc/init.d/apache2'
	MYSQL='/etc/init.d/mysql'
	ACTION='stop'
	if [  "`${APACHE} status`" = 'Apache2 is NOT running.' ]
	then
		echo -e "${white}iniciando servidor${NC}"
		ACTION='start'
	else
		echo -e "${red}deteniendo servidor${NC}"
	fi
	${APACHE} ${ACTION}
	${MYSQL} ${ACTION}
}
# Inicia!!.
RETVAL=0
case "${1}" in
   "")
	echo -e "${yellow}ERROR:${NC}
	${red}Falta de argumento!!.${NC}
	Use: ${0} ${white}[OPCIÓN]${NC}

${yellow}DESCRIPCIÓN:${NC}
	Instala la aplicación, extrayendo la información de APP/config/app_data.xml

${yellow}OPCIONES DISPONIBLES:${NC}
	${light}-a${NC}	APP INSTALL: Instala los archivos de la APP
	${light}-d${NC}	DATA INSTALL: Instala los datos SQL, ubicados en APP/config/schema/db/
	${light}-f${NC}	FULL INSTALL:Instala los archivos de la APP y los datos SQL
	${light}-u${NC}	UPDATE SERVER: Sube los archivos en un servidor(Todavia no implementada)
	${light}-s${NC}	START/STOP SERVER: Inicia/detiene el servidor web.

${yellow}OPCIONES DISPONIBLES DE LA CONSOLA CAKE:${NC}

${light} acl [CORE]                    command_list [CORE]           schema [CORE]
 api [CORE]                    console [CORE]                testsuite [CORE]
 bake [CORE]                   i18n [CORE]                   upgrade [CORE]${NC}

${yellow}EJEMPLOS:${NC}
	${cyan}#Instalando los archivos de la APP${NC}
	${0} -a
	${cyan}#Instalando los datos SQL, ubicados en APP/config/schema/db/${NC}
	${0} -d
	${cyan}#Instalando los archivos de la APP y los datos SQL${NC}
	${0} -f
	${cyan}#Iniciando o Deteniendo el Servidor${NC}
	${0} -s
	${cyan}#Corriendo de la consola el horno (bake)${NC}
	${0} bake
	${cyan}#Corriendo de la consola informacion (API)${NC}
	${0} api
"
      RETVAL=1
      ;;
   -a)
      actualiza_work_path
      ;;
   -d)
      update_db
      ;;
   -f)
		actualizar_path
		update_db
	;;
   acl|command_list|schema|api|console|testsuite|bake|i18n|upgrade|filezilla|user)
		LIB=$(echo "${APP_DST}" | sed 's/app$//')
		LIB="${LIB}lib/Cake/Console/"
		exec php -q "$LIB"cake.php -working "$APP" "$@"
     ;;
  -s)
	iniciar_parar_servidor
	;;
esac
exit ${RETVAL}
