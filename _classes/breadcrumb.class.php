<?php

class breadcrumb
{
	private $nav = array();
	
	public function __construct(){}
	
	public function add($link, $name)
	{
		$this->nav[] = array(
			'link'=> $link,
			'name' => $name
		);
	}

	public function out($sep = '<span class="bull">»</span>')
	{
		$ret = '';
		$first = true;
		foreach($this->nav as $val)
		{
			if ($first === false)
				$ret .=  PHP_EOL . $sep . PHP_EOL;
			
			if ($val['link'] !== false)
				$ret .= '<a href="' . htmlspecialchars($val['link']) . '">' . htmlspecialchars($val['name']) . '</a>';
			else
				$ret .= htmlspecialchars($val['name']);
			
			$first = false;
		}
		return $ret;
	}
}