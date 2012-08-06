<?php
/**
 *
 * Gravatar URL Generation for Controllers
 *
 * @package        app
 * @package        app.controller.component
 * @author         Chris Stevens
 * @link           https://github.com/stevenscg/cakephp-gravatar
 */
App::uses('Component', 'Controller');
App::import(array('Security'));

class GravatarComponent extends Component {
	function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
	}

	/**
	 * Base gravatar url
	 *
	 * @var string
	 */
	private $base_url = 'http://www.gravatar.com/';

	/**
	 * Secure gravatar url
	 *
	 * @var string
	 */
	private $base_url_ssl = 'https://secure.gravatar.com/';

	/**
	 * Secure / SSL flag
	 *
	 * @var bool true to force ssl, false to force non-ssl, null to follow current proto
	 */
	private $ssl = null;

	/**
	 * Size of the image
	 *
	 * @var string
	 */
	private $size = 80;

	/**
	 * Gravatar rating
	 *
	 * @var string
	 */
	private $rating = 'pg';

	/**
	 * Array of possible ratings
	 *
	 * @var string
	 */
	private $possibleRatings = array('g', 'pg', 'r', 'x');

	/**
	 * Default image.  custom or [ 404 | mm | identicon | monsterid | wavatar ]
	 *
	 * @var string
	 */
	private $default = 'mm';


	/**
	 * Hash type used
	 *
	 * @var string
	 */
	private $hashType = 'md5';

	public $profile = array();


	/**
	 * Validate the options array
	 *
	 * @param string $options
	 * @return void
	 */
	private function validateOptions($options) {
		// Define the 'is_ssl' method in AppHelper to
		// use auto-sensing of the current request protocol
		if (isset($options['ssl']) && ($options['ssl'] === true)) {
				$this->ssl = true;
		} else if (isset($options['ssl']) &&  ($options['ssl'] === false)) {
				$this->ssl = false;
		} else if (method_exists($this, 'is_ssl')) {
				$this->ssl = $this->is_ssl();
		}

		if (isset($options['rating'])) {
			if (in_array($this->rating, $this->possibleRatings)) {
				$this->rating = $options['rating'];
			}
		}

		if (isset($options['size'])) {
			if (is_numeric($options['size']) && $options['size'] >=1 && $options['size'] <= 512) {
				$this->size = $options['size'];
			}
		}

		if (isset($options['default'])) {
			if (strpos($options['default'], 'http') === 0) {
				$this->default = h($options['default']);
			} else {
				$this->default = $options['default'];
			}
		}
	}


	/**
	 * Hash the email address
	 *
	 * @param string $email
	 * @return hash
	 * @author Chris Stevens
	 */
	private function hashEmail($email) {
		return Security::hash(strtolower(trim($email)), $this->hashType);
	}


	/**
	 * Generate the image url
	 *
	 * @param string $email
	 * @param string $options
	 * @return image url of the gravatar
	 * @author Chris Stevens
	 */
	public function url($email, $options=array()) {
		$this->validateOptions($options);

		$url_params = "?s=".$this->size."&r=".$this->rating;

		if (!empty($this->default)) {
			$url_params .= "&d=".$this->default;
		}

		if ($this->ssl) {
			return $this->base_url_ssl.'avatar/'.$this->hashEmail($email).$url_params;
		}

		return $this->base_url.'avatar/'.$this->hashEmail($email).$url_params;
	}

	/**
	 * Return success if gravatar exists
	 *
	 * @access public
	 * @link http://en.gravatar.com/site/implement/profiles/php/
	 */
	public function accountExists($email, $loadProfile = true) {
		$url = ($this->ssl? $this->base_url_ssl : $this->base_url);
		$url .= $this->hashEmail($email) . ".php";
		$str = @file_get_contents( $url );
		$profile = @unserialize( $str );
		if ( is_array( $profile ) && isset( $profile['entry'] ) ) {
			if( $loadProfile ) {
				$this->profile = $profile;
			}
			return true;
			} else {
				return false;
		}
	}//end function

	function loadProfile($email) {
		return $this->accountExists($email);
	}//end function
	/**
	* Descripción de la función
	*
	* @param string $email
	* @param string $fileDst
	* @param string $options
	* @return mixed number of bytes that were written to the file, or FALSE on failure.
	* @access public
	* @link [URL de mayor infor]
	*/
	public function download($email, $fileDst, $options=array()) {
		$this->validateOptions($options);
		$path = dirname(dirname(dirname(__FILE__)));
		$path .= $fileDst;
		if( !is_dir(dirname($path)) ) {
			if( !@mkdir(dirname($path),0755, true)) {
				return false;
			}
		}
		$ch = curl_init();
		if( $ch === false) {
			return false;
		}
		$timeout = 5;
		$url = $this->url($email, $options);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		return file_put_contents($path, $data);
	}//end function
}
