<?php
/**
 * Validate Element
 * ----
 *
 */
class NyaaValidate extends NyaaObject
{	
	protected $keys     = array();
	protected $template = "%field is empty";
	protected $con = ",";
	public $Validater;

	public static function factory( $option )
	{
		$type = $option['type'];
		$file = dirname(__FILE__).'/validate.'.strtolower($type).'.class.php';
		require_once $file;
		$class = 'NyaaValidate'.ucfirst(strtolower($type));
		$validate = new $class( );
		if(isset($option['target'])) foreach($option['target'] as $t)
			$validate->addTarget($t);
		if(isset($option['message']))
			$validate->setMessage($option['message']);
		if(isset($option['con']))
			$validate->setConWord($option['con']);
		$validate->init( $option );
		return $validate;
	}

	function init($option)
	{
	}

	function addTarget( $key )
	{
		$this->keys[] = $key;
	}

	function setMessage( $template )
	{
		$this->template = $template;
	}

	function setConWord( $word )
	{
		$this->con = $word;
	}

	function validate( $datas )
	{
		return $this->validArray( $this->keys, $datas );
	}

	function setValidater( $Validater )
	{
		$this->Validater = $Validater;
	}



}

class NyaaValidateResult
{
	private $invalid = array();
	private $template = false;
	private $con = ',';

	function __construct( )
	{

	}

	function setTemplate( $template )
	{
		$this->template = $template;
	}

	function setConWord( $word )
	{
		$this->con = $word;
	}

	function addInvalid( $k )
	{
		$this->invalid[] = $k;
	}

	function isError( )
	{
		return empty($this->invalid) ? false: true;
	}

	function getMessage( $template = false )
	{
		$template = $template !== false ? $template: $this->template;
		$fields = implode($this->con, $this->invalid);
		return preg_replace('/%field/', $fields, $template);
	}
}
?>
