## ADSL formulario:

Esto es un ejemplo de como generar el archivo PDF con un formulario rellenable desde el archivo latex(tex) es necesario tener el paquete pdflatex en GNU/Linux o su equivalente de latex en otros sistemas operativos.

## 1.- Instalando pdflatex(requiere permisos para instalar paquetes):
En sistemas ubuntu y derivados de debian:
 
	apt-get update -y && apt-get install -y pdflatex && apt-get autoclean

En fedora y derivados de redhat:

	yum update -y && yum install -y pdflatex*

## 2.- Generando el PDF apartir del archivo latex:

	pdflatex adsl-cuestionario-fin-curso.tex


##3.- Visualizar:

Finalmente para visualizar el PDF esto se puede hacer desde cualquier visor de pdf's p.e:

	evince adsl-cuestionario-fin-curso.pdf &


