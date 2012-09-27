<?php

class object_helper
{
	private function __construct(){}
	
	public static function map($array, $object, $strict = false)
	{
		$ref = new ReflectionObject($object);
		
		foreach($array as $key => $val)
		{
			if ($strict && !$ref->hasProperty($key))
				continue;
			
			$prop = $ref->getProperty($key);
			
			if ($prop->isPublic())
				$prop->setValue($object, $val);
		}
	}
}