<?php
/**
 * Validater For Custom
 * ----
 *
 */
class NyaaValidateCustom  extends NyaaValidate
{

	function init( $option )
	{
		$this->func = $option['func'];
	}

	function validArray( $keys, $array )
	{
		$result = new NyaaValidateResult( );
		$result->setTemplate( $this->template );
		$result->setConWord( $this->con );
		call_user_func($this->func, $keys, $array, &$result, &$this->Validater);
		return $result;
	}
}
?>
