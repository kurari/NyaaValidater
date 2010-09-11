<?php
/**
 * Validater
 * ----
 *
 */
class NyaaValidateNotnull  extends NyaaValidate
{
	function validArray( $keys, $array )
	{
		$result = new NyaaValidateResult( );
		$result->setTemplate( $this->template );
		$result->setConWord( $this->con );
		foreach( $keys as $k )
		{
			if( !isset($array[$k]) || empty($array[$k]) )
				$result->addInvalid($k);
		}
		return $result;
	}
}
?>
