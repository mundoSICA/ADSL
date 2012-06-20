#!/bin/bash
#################################################################################
#Traductor: app/View/
#################################################################################
#
#

#################################################################################
#Cambiando todos los view por ver.
#################################################################################
function view_2_ver {	
	#1.-Cambiando las acciones que apunten a  view por ver
		sed -ie "s/'action' => 'view'/'action' => 'ver'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	#2.-Cambiando la definición de las acciones(funciones) en los controladores
		sed -ie "s/function view(/function ver(/gi" $(find ../app/Controller/. -iregex ".*\.php$")
		#en caso que pertenezca a una clase con prefijo
		sed -rie "s/function ([_a-z0-9]+)_view\(/function \1_ver\(/gi" $(find ../app/Controller/. -iregex ".*\.php$")
	#3.-Quitando las traducciones que apuntan a View
		sed -ie "s/__('View')/'Ver'/" $(find ../app/View/. -iregex ".*\.ctp$")
	#4.-Cambiamos de nombre a todos los archivos view.ctp por ver.ctp en la carpeta ../app/View/.
		for i in $(find ../app/View/ -iregex ".*view\.ctp$"); do
			j=`echo $i | sed -r "s/([^/]*)view\.ctp$/\1ver\.ctp/gi"`
			mv  $i $j;
		done
}
#################################################################################
#
#################################################################################
function edit_2_editar {
	#1.-Cambiando las acciones que apunten a  edit por editar
		sed -ie "s/'action' => 'edit'/'action' => 'editar'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	#2.-Cambiando la definición de las acciones(funciones) en los controladores
		sed -ie "s/function edit(/function editar(/gi" $(find ../app/Controller/. -iregex ".*\.php$")
		#en caso que pertenezca a una clase con prefijo
		sed -rie "s/function ([_a-z0-9]+)_edit\(/function \1_editar\(/gi" $(find ../app/Controller/. -iregex ".*\.php$")
	#3.-Quitando las traducciones que apuntan a View
		sed -ie "s/__('Edit')/'Editar'/" $(find ../app/View/. -iregex ".*\.ctp$")
	#4.-Cambiamos de nombre a todos los archivos edit.ctp por editar.ctp en la carpeta ../app/View/.
		for i in $(find ../app/View/ -iregex ".*edit\.ctp"); do
			j=`echo $i | sed -r "s/([^/]*)edit\.ctp$/\1editar\.ctp/gi"`
			mv  $i $j
		done
		
}
#################################################################################
#
#################################################################################
function add_2_agregar {
	#1.-Cambiando las acciones que apunten a  edit por editar
		sed -ie "s/'action' => 'add'/'action' => 'agregar'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
		sed -rie "s/<\?php echo __\('Add ([a-z0-9]+)'\); \?>/Agregar \1/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	#2.-Cambiando la definición de las acciones(funciones) en los controladores
		sed -ie "s/function add(/function agregar(/gi" $(find ../app/Controller/. -iregex ".*\.php$")
		#en caso que pertenezca a una clase con prefijo
		sed -rie "s/function ([_a-z0-9]+)_add\(/function \1_agregar\(/gi" $(find ../app/Controller/. -iregex ".*\.php$")
	#3.-Quitando las traducciones que apuntan a View
		sed -ie "s/__('Add')/'Agregar'/" $(find ../app/View/. -iregex ".*\.ctp$")
	#4.-Cambiamos de nombre a todos los archivos add.ctp por agregar.ctp en la carpeta ../app/View/.
		for i in $(find ../app/View/ -iregex ".*add\.ctp"); do
			j=`echo $i | sed -r "s/([^/]*)add\.ctp$/\1agregar\.ctp/gi"`
			mv  $i $j
		done
}
#################################################################################
#
#################################################################################
function delete_2_borrar {
	#1.-Cambiando las acciones que apunten a  edit por editar
		sed -ie "s/'action' => 'delete'/'action' => 'borrar'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	#2.-Cambiando la definición de las acciones(funciones) en los controladores
		sed -ie "s/function delete(/function borrar(/gi" $(find ../app/Controller/. -iregex ".*\.php$")
		#en caso que pertenezca a una clase con prefijo
		sed -rie "s/function ([_a-z0-9]+)_delete\(/function \1_borrar\(/gi" $(find ../app/Controller/. -iregex ".*\.php$")
	#3.-Quitando las traducciones que apuntan a View
		sed -ie "s/__('Delete')/'Borrar'/" $(find ../app/View/. -iregex ".*\.ctp$")
		sed -ie "s/'Are you sure you want to delete # %s?'/'Esta seguro que desea borrar: # %s?'/" $(find ../app/View/. -iregex ".*\.ctp$")
}

###########################################################################################
#	Traduce 2 clases, de las tres principales clases:
#		ver: Este suele ser la visualizacion de un item.
#		formulario: es el que ocupa en el agregar o editar un item.
#		index: Suele ser un listado de los items.
###########################################################################################
function css_clases {
	#1.- Cambiamos la clase view ahora sera hacia ver
	sed -ie 's/ view">/ ver">/gi' $(find ../app/View/. -iregex ".*\.ctp$")
	sed -ie 's/.view /.ver/gi' $(find ../app/webroot/css/ -iregex ".*\.css$")

	#2.- Cambiamos la clase a form ahora sera hacia formulario
	sed -ie 's/ form">/ formulario">/gi' $(find ../app/View/. -iregex ".*\.ctp$")
	sed -ie 's/.form /.formulario/gi' $(find ../app/webroot/css/ -iregex ".*\.css$")
	
	#3.- Cambiando la clase actions por acciones
	sed -ie 's/="actions"/="acciones"/gi' $(find ../app/View/. -iregex ".*\.ctp$")
	sed -ie 's/.actions /.acciones /gi' $(find ../app/webroot/css/ -iregex ".*\.css$")
}
#################################################################################
#
#################################################################################
function paginator {
	sed -ie  "s/'< ' . __('previous')/'< Anterior'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	sed -ie  "s/__('next') . ' >'/'Siguiente >'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	sed -ie  "s/__('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')/'Página %page% de %pages%, viendo %current% registros de un total %count%, iniciando en %start% acabando en %end%'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	##Acciones no pirura!!!..
	sed -rie  "s/<\?php\s*echo\s*__\('Actions'\);\s*\?>/Acciones/gi" $(find ../app/View/. -iregex ".*\.ctp$")
}

function links {
	sed -rie "s/__\('New ([a-z0-9]+)'\)/'Agregar \1'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	sed -rie "s/__\('Add ([a-z0-9]+)'\)/'Agregar \1'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	sed -rie "s/__\('([a-z0-9]+) Add ([a-z0-9]+)'\)/'\1 Agregar \2'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	sed -rie "s/__\('List ([a-z0-9]+)'\)/'Listar \1'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	sed -rie "s/__\('Delete ([a-z0-9]+)'\)/'Borrar \1'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	sed -rie "s/__\('Edit ([a-z0-9]+)'\)/'Editar \1'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	sed -rie "s/__\('([a-z0-9]+) Edit ([a-z0-9]+)'\)/'\1 Editar \2'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	sed -rie "s/__\('Submit'\)/'Enviar'/gi" $(find ../app/View/. -iregex ".*\.ctp$")
	#Borrado de notificaciones flash
	sed -rie "s/__\('The ([a-z0-9]+) could not be saved. Please, try again.'\)/'El registro \1. No pudo ser guardado'/gi" $(find ../app/Controller/. -iregex ".*\.php$")
	sed -rie "s/__\('The ([a-z0-9]+) has been saved'\)/'El registro \1. Fue guardado'/gi" $(find ../app/Controller/. -iregex ".*\.php$")
	sed -rie "s/__\('([a-z0-9]+) was not deleted'\)/'\1. No se pudo borrar'/gi" $(find ../app/Controller/. -iregex ".*\.php$")
	sed -rie "s/__\('([a-z0-9]+) deleted'\)/'\1. Borrado'/gi" $(find ../app/Controller/. -iregex ".*\.php$")
	sed -rie "s/__\('Invalid ([a-z0-9]+)'\)/'Registro invalido: \1.'/gi" $(find ../app/Controller/. -iregex ".*\.php$")
	sed -rie "s/<\?php echo __\('Related ([a-z0-9]+)'\);\?>/\1 Relacionados/gi" $(find ../app/View/. -iregex ".*\.ctp$")
}

#################################################################################
#
#################################################################################
function rm_backups {
	find ../app/View/ -iregex ".*\.ctpe$" | xargs rm -fr 
	find ../app/Controller/ -regex ".*\.phpe$"  | xargs rm -fr 
	find ../app/webroot/ -regex ".*\.csse$"  | xargs rm -fr 
}

#function svn_ci() {
	#deja las cosas listas para hacer un commit con svn.
#	echo 'Actualizacion SVN'
	#1.- Agregamos las vistas nuevas (los que empiezan con ?) al svn
#	echo 'Archivos por agregar'
#	svn status | grep -E "^\?.*\.ctp$" | awk '{print $2}' | xargs svn add 
#	echo 'Archivos por eliminar'
	#2.- Borramos las vistas no encontradas por el svn (los que empiezan con !)
#	svn status | grep -E "^\!.*\.ctp$" | awk '{print $2}' | xargs svn rm --force 
#}


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
