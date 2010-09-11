<?php
/**
 * Validater
 *
 */

class NyaaValidater extends NyaaObject
{
	private $validaters = array();

	function addValidate( $validate )
	{
		$validate->setValidater( $this );
		$this->validaters[] = $validate;

	}

	function validate( $data )
	{
		$results = array();
		foreach($this->validaters as $v)
		{
			$res = $v->validate( $data );
			if( $res->isError( ) )
			{
				$results[] =  $res;
			}
		}
		return empty($results) ? true: $results;
	}

}
?>
