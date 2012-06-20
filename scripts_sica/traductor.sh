#!/bin/bash
#Traductor: de cakePHP al español mexicano
#

##########################################################################################
# Validación de la existencia de la carpeta app
##########################################################################################
export APP=$(readlink -f "$0" | sed 's/scripts_sica\/traductor.sh/app/')
if [ ! -d "${APP}" ]
then
	echo 'Falta la carpeta de la aplicación, revise que exista el directorio';
	echo "${APP}";
	exit 0;
fi

#################################################################################
#Cambiando todos los view por ver.
#################################################################################
function view_2_ver {
	#1.-Cambiando las acciones que apunten a  view por ver
		sed -ie "s/'action' => 'view'/'action' => 'ver'/gi" $(find "${APP}/View/." -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	#2.-Cambiando la definición de las acciones(funciones) en los controladores
		sed -ie "s/function view(/function ver(/gi" $(find "${APP}/Controller/." -iregex ".*\.php$")
		#en caso que pertenezca a una clase con prefijo
		sed -rie "s/function ([_a-z0-9]+)_view\(/function \1_ver\(/gi" $(find "${APP}/Controller/." -iregex ".*\.php$")
	#3.-Quitando las traducciones que apuntan a View
		sed -ie "s/__('View')/'Ver'/" $(find "${APP}/View/." -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	#4.-Cambiamos de nombre a todos los archivos view.ctp por ver.ctp en la carpeta ${APP}/View/.
		for i in $(find "${APP}/View/" -iregex ".*view\.ctp$" | grep -v 'View/Errors/'); do
			j=`echo "$i" | sed -r "s/([^/]*)view\.ctp$/\1ver\.ctp/gi"`
			mv  "$i" "$j";
		done
}
#################################################################################
#
#################################################################################
function edit_2_editar {
	#1.-Cambiando las acciones que apunten a  edit por editar
		sed -ie "s/'action' => 'edit'/'action' => 'editar'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	#2.-Cambiando la definición de las acciones(funciones) en los controladores
		sed -ie "s/function edit(/function editar(/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
		#en caso que pertenezca a una clase con prefijo
		sed -rie "s/function ([_a-z0-9]+)_edit\(/function \1_editar\(/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
	#3.-Quitando las traducciones que apuntan a View
		sed -ie "s/__('Edit')/'Editar'/" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	#4.-Cambiamos de nombre a todos los archivos edit.ctp por editar.ctp en la carpeta ${APP}/View/.
		#IFS="$(echo -e "\n\r")"
		for i in $(find "${APP}/View/" -iregex ".*edit\.ctp" | grep -v 'View/Errors/'); do
			j=`echo $i | sed -r "s/([^/]*)edit\.ctp$/\1editar\.ctp/gi"`
			mv  "$i" "$j"
		done
		#IFS=" "
}
#################################################################################
#
#################################################################################
function add_2_agregar {
	#1.-Cambiando las acciones que apunten a  edit por editar
		sed -ie "s/'action' => 'add'/'action' => 'agregar'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
		sed -rie "s/<\?php echo __\('Add ([a-z0-9]+)'\); \?>/Agregar \1/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	#2.-Cambiando la definición de las acciones(funciones) en los controladores
		sed -ie "s/function add(/function agregar(/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
		#en caso que pertenezca a una clase con prefijo
		sed -rie "s/function ([_a-z0-9]+)_add\(/function \1_agregar\(/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
	#3.-Quitando las traducciones que apuntan a View
		sed -ie "s/__('Add')/'Agregar'/" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	#4.-Cambiamos de nombre a todos los archivos add.ctp por agregar.ctp en la carpeta ${APP}/View/.
		for i in $(find "${APP}/View/" -iregex ".*add\.ctp" | grep -v 'View/Errors/'); do
			j=`echo $i | sed -r "s/([^/]*)add\.ctp$/\1agregar\.ctp/gi"`
			mv  "$i" "$j"
		done
}
#################################################################################
#
#################################################################################
function delete_2_borrar {
	#1.-Cambiando las acciones que apunten a  edit por editar
		sed -ie "s/'action' => 'delete'/'action' => 'borrar'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	#2.-Cambiando la definición de las acciones(funciones) en los controladores
		sed -ie "s/function delete(/function borrar(/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
		#en caso que pertenezca a una clase con prefijo
		sed -rie "s/function ([_a-z0-9]+)_delete\(/function \1_borrar\(/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
	#3.-Quitando las traducciones que apuntan a View
		sed -ie "s/__('Delete')/'Borrar'/" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
		sed -ie "s/'Are you sure you want to delete # %s?'/'Esta seguro que desea borrar: # %s?'/" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
}

###########################################################################################
#	Traduce 2 clases, de las tres principales clases:
#		ver: Este suele ser la visualizacion de un item.
#		formulario: es el que ocupa en el agregar o editar un item.
#		index: Suele ser un listado de los items.
###########################################################################################
function css_clases {
	#1.- Cambiamos la clase view ahora sera hacia ver
	sed -ie 's/ view">/ ver">/gi' $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -ie 's/.view /.ver/gi' $(find "${APP}/webroot/css/" -iregex ".*\.css$")

	#2.- Cambiamos la clase a form ahora sera hacia formulario
	sed -ie 's/ form">/ formulario">/gi' $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -ie 's/.form /.formulario/gi' $(find "${APP}/webroot/css/" -iregex ".*\.css$")
	
	#3.- Cambiando la clase actions por acciones
	sed -ie 's/="actions"/="acciones"/gi' $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -ie 's/.actions /.acciones /gi' $(find "${APP}/webroot/css/" -iregex ".*\.css$")
}
#################################################################################
#
#################################################################################
function paginator {
	sed -ie  "s/'< ' . __('previous')/'< Anterior'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -ie  "s/__('next') . ' >'/'Siguiente >'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -ie  "s/__('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')/'Página %page% de %pages%, viendo %current% registros de un total %count%, iniciando en %start% acabando en %end%'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	##Acciones no pirura!!!..
	sed -rie  "s/<\?php\s*echo\s*__\('Actions'\);\s*\?>/Acciones/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
}

function links {
	sed -rie "s/__\('New ([a-z0-9]+)'\)/'Agregar \1'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -rie "s/__\('Add ([a-z0-9]+)'\)/'Agregar \1'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -rie "s/__\('([a-z0-9]+) Add ([a-z0-9]+)'\)/'\1 Agregar \2'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -rie "s/__\('List ([a-z0-9]+)'\)/'Listar \1'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -rie "s/__\('Delete ([a-z0-9]+)'\)/'Borrar \1'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -rie "s/__\('Edit ([a-z0-9]+)'\)/'Editar \1'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -rie "s/__\('([a-z0-9]+) Edit ([a-z0-9]+)'\)/'\1 Editar \2'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	sed -rie "s/__\('Submit'\)/'Enviar'/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
	#Borrado de notificaciones flash
	sed -rie "s/__\('The ([a-z0-9]+) could not be saved. Please, try again.'\)/'El registro \1. No pudo ser guardado'/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
	sed -rie "s/__\('The ([a-z0-9]+) has been saved'\)/'El registro \1. Fue guardado'/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
	sed -rie "s/__\('([a-z0-9]+) was not deleted'\)/'\1. No se pudo borrar'/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
	sed -rie "s/__\('([a-z0-9]+) deleted'\)/'\1. Borrado'/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
	sed -rie "s/__\('Invalid ([a-z0-9]+)'\)/'Registro invalido: \1.'/gi" $(find "${APP}/Controller/" -iregex ".*\.php$")
	sed -rie "s/<\?php echo __\('Related ([a-z0-9]+)'\);\?>/\1 Relacionados/gi" $(find "${APP}/View/" -iregex ".*\.ctp$" | grep -v 'View/Errors/')
}

#################################################################################
#
#################################################################################
function rm_backups {
	find "${APP}/View/" -iregex ".*\.ctpe$" | xargs rm -fr 
	find "${APP}/Controller/" -regex ".*\.phpe$"  | xargs rm -fr 
	find "${APP}/webroot/" -regex ".*\.csse$"  | xargs rm -fr 
}

##########################################################################################
#Otra forma de iterar
#ls -1 |while read i; do echo $i; done
#
#for i in *; do echo $i; done
#
#for i in "$(ls  ~/Música/)"; do echo "$i"; done
#####################
#poniendo variable IFS
#IFS="$(echo -e "\n\r")"
##########################################################################################

view_2_ver
edit_2_editar
add_2_agregar
delete_2_borrar
css_clases
#rm_backups
#svn_ci
paginator
links
rm_backups
