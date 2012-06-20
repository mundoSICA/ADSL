<?php
/**
 * Sluggable Behavior Class.
 *
 * Enables a model object to sluggable behavior.
 * 
 * @Author        fitorec
 * @copyright     2010-2012, SICÁ (tm)- soluciones integrales en computación aplicada.
 * @link          https://github.com/mundoSICA/cakephp_behavior_slug
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @since         SICÁ(tm) v 0.1
 */

class SlugBehavior extends ModelBehavior {
/**
 * Errors
 * @var array
 */
	var $errors = array();

/**
 * Defaults - slug_dst and slug_src should be uniqued
 *
 * @var array
 * @access protected
 */
	var $_defaults = array(
		'slug_src' => 'title',
		'slug_dst' => 'slug_dst',
		'max_len' => 100,
		'wd_separator' => '-',
		'extension_active' => false,
	);
/**
 * Descripción de argumentos:
 * 
 * slug_src : Este campo sera el que se convertira en slug_dst
 *				p.e. Articulo.titulo = "Este es un articulo sobre el comportamiento Slug"
 * 
 * slug_dst :	Es el valor slug, para el comportamiento slug, este campo se convierte sufre una trasformación slug
 * 				p.e. Articulo.slug = "este-es-un-articulo-sobre-el-comportamiento-slug" .
 * 
 * 
 * max_len : La longitud maxima que puede llegar a tomar slug_dst.
 *				p.e. con max_len=30 : Articulo.slug = "este-es-un-articulo-sobre-el-c" .
 * 
 * wd_separator: Caracter separadora de palabras, por defecto(-).
 * 			 	p.e. con 'wd_separator'='_' : Articulo.slug = "este_es_un_articulo_sobre_el_comportamiento_slug" .
 * 
 * extension_active: Por defecto false, si activamos este campo agrega la extensión '.html',
 *	 			reduciendo el max_len - 5 (la longitud de '.html').
 * 				p.e. Articulo.slug = "este-es-un-articulo-sobre-el-comportamiento-slug.html"
 * 
 * */

/**
 * Initiate Slug behavior
 *
 * @param object $Model instance of model
 * @param array $config array of configuration settings.
 * @return void
 * @access public
 */
	function setup(&$Model, $config = null) {
		$settings = array();
		if($config){
			if ( is_string($config) )
				$config = array('slug_src' => $config);
			elseif( is_array($config) )
				$settings = array_merge($this->_defaults, $config);
		}else
			$settings = $this->_defaults;
		#Si por alguna razón no se ha configurado el slug_src
		if( !$Model->hasField($settings['slug_src']) )
			$settings['slug_src'] = $Model->displayField;
		#Si por alguna razón No se ha configurado el slug_dst
		if( !$Model->hasField($settings['slug_dst']) )
			$settings['slug_dst'] = $settings['slug_src'];
		$this->settings[$Model->alias] = $settings;
	}
/**
 * Descripción de la función
 *
 * @param tipo $parametro1 descripción del párametro 1.
 * @return tipo descripcion de lo que regresa
 * @access public
 * @link [URL de mayor infor]
 */
	function slugStr(&$Model, $str = null ) {
			extract($this->settings[$Model->alias]);
			if(is_null($str)){
				if(is_null($Model->{$slug_src}))
					return null;
				else
					$str = $Model->{$slug_src};
			}
			$slug=strtolower(Inflector::slug($str,'-'));
			if( $extension_active == true )
				$max_len -= 5;
			if( strlen( $slug ) > $max_len )
				$slug = substr($slug, 0, $max_len);
			return ( $extension_active == true )? $slug.'.html' : $slug;
	}

/**
 * Before save method. Called before all saves
 *
 * Overriden to transparently manage setting the lft and rght fields if and only if the parent field is included in the
 * parameters to be saved. For newly created nodes with NO parent the left and right field values are set directly by
 * this method bypassing the setParent logic.
 *
 * @param AppModel $Model Model instance
 * @return boolean true to continue, false to abort the save
 * @access public
 */
	function beforeSave(&$Model) {
		$alias=$Model->alias;
		extract($this->settings[$Model->alias]);
		if( $Model->data[$alias][$slug_src] && (!isset($Model->data[$alias][$slug_dst]) || !$Model->data[$alias][$slug_dst]))
			$Model->data[$alias][$slug_dst] = $this->slugStr($Model, $Model->data[$alias][$slug_src]);
		#Regresamos el resultado del unique para el campo slug a guardar
		return $Model->isUnique(array($slug_dst));
	}
/**
 * Returns a list of fields from the database, and sets the current model
 * data (Model::$data) with the record found.
 *
 * @param mixed $fields String of single fieldname, or an array of fieldnames.
 * @param mixed $id The ID of the record to read
 * @return array Array of database fields, or false if not found
 * @access public
 * @link http://book.cakephp.org/view/1017/Retrieving-Your-Data#read-1029
 */
	function readBySlug(&$Model, $fields = null, $slug=null) {
		extract($this->settings[$Model->alias]);
		if ($slug != null) {
			$Model->{$slug_dst} = $slug;
		}
		$Model->validationErrors = array();
		if ($slug !== null && $slug !== false) {
			$Model->data = $Model->find('first', array(
				'conditions' => array($Model->alias . '.' . $slug_dst => $slug),
				'fields' => $fields
			));
			return $Model->data;
		} else {
			return false;
		}
	}
/**
 * Returns the primaryKey field of Model
 *
 * @param string $slug String of slug_dst.
 * @return string field contents, or false if not found
 * @access public
 * @link http://book.cakephp.org/view/1017/Retrieving-Your-Data#field-1028
 */
	function primaryKeyBySlug(&$Model, $slug=null, $setPrimaryKey = false) {
		extract($this->settings[$Model->alias]);
		$conditions = array($Model->alias . '.' . $slug_dst => $slug);
		$PrimaryKey = $Model->field($Model->primaryKey, $conditions);
		if($setPrimaryKey)
			$Model->{$Model->primaryKey} = $PrimaryKey;
		return $PrimaryKey;
	}
/**
 * Regresa el Slug apartir de la clave primaria
 *
 * @param string $key_val el valor de la clave primaria
 * @return string $slug_dst el valor del slug
 * @access publico
 */
	function getSlug(&$Model, $key_val) {
		extract($this->settings[$Model->alias]);
		if( isset($Model->{$slug_dst}) && $Model->{$slug_dst} != NULL)
			return $Model->{$slug_dst};
		return $Model->field($slug_dst, array($Model->alias . '.' . $Model->primaryKey => $key_val));
	}
}
