<?php
/**
 * Plantilla para el Controlador generado por el bake de CakePhp
 *
 * @author     fitorec - <chanerec@gmail.com>
 * @copyright  2012-2012 micorreofacil.com
 * @link       http://www.mundosica.com
 */
echo "<?php\n";
?>
/**
 * Controlador <?php echo $controllerName."\n"; ?>
 *
 * @author     @fitorec - <chanerec@gmail.com>
 * @copyright  2012-2012 micorreofacil.com
 * @creado     <?php echo date('F j, Y, g:i a')."\n"; ?>
<?php
if (!$isScaffold) {
	$defaultModel = Inflector::singularize($controllerName);
	echo " * @property {$defaultModel} \${$defaultModel}\n";
	if (!empty($components)) {
		foreach ($components as $component) {
			echo " * @property {$component}Component \${$component}\n";
		}
	}
}
?>
 */

<?php
	echo "App::uses('{$plugin}AppController', '{$pluginPath}Controller');\n";
?>

class <?php echo $controllerName; ?>Controller extends <?php echo $plugin; ?>AppController {

<?php if ($isScaffold): ?>
/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
<?php else:

    if (count($helpers)):
        echo "/**\n * Helpers\n *\n * @var array\n */\n";
        echo "\tpublic \$helpers = array(";
        for ($i = 0, $len = count($helpers); $i < $len; $i++):
            if ($i != $len - 1):
                echo "'" . Inflector::camelize($helpers[$i]) . "', ";
            else:
                echo "'" . Inflector::camelize($helpers[$i]) . "'";
            endif;
        endfor;
        echo ");\n\n";
    endif;

    if (count($components)):
        echo "/**\n * Components\n *\n * @var array\n */\n";
        echo "\tpublic \$components = array(";
        for ($i = 0, $len = count($components); $i < $len; $i++):
            if ($i != $len - 1):
                echo "'" . Inflector::camelize($components[$i]) . "', ";
            else:
                echo "'" . Inflector::camelize($components[$i]) . "'";
            endif;
        endfor;
        echo ");\n\n";
    endif;
?>
/**
 * beforeFilter - Se ejecuta antes de cada acción
 */
	function beforeFilter() {
				//$this->Auth->allow(array('index', 'ver'));
				parent::beforeFilter();
	}// fin beforeFilter

<?php
    echo trim($actions) . "\n";

endif; ?>

}// fin controlador <?php $controllerName ?>
