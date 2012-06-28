<?php
/* Layout diseñado para el manejo de archivos en formato XML
 * Autor:   Fitorec
 * Date :   2012/06/24 19:54:18
 */
header ('Content-Type:text/xml');
echo $this->fetch('content');
