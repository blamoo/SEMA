<?php

class tester implements Countable
{
	private $erros = array();
	private $count = 0;
	private $passedall = true;
	private $usedIds = array();
	
	public function addError($id, $message)
	{
		if ($id === 'auto')
			$this->erros[] = (string) $message;
		else
		{
			if (isset($this->erros[(int) $id]))
				throw new Exception('Esse código de erro já foi usado (id: ' . $id . ')');
			
			$this->erros[(int) $id] = (string) $message;
		}
		$this->passedall = false;
		$this->count++;
	}
	
	public function reset()
	{
		$this->erros = array();
		$this->count = 0;
		$this->passedall = true;
	}
	
	public function remove($id)
	{
		if (isset($this->erros[$id]))
		{
			unset($this->erros[$id]);
			
			if (--$this->count === 0)
				$this->passedall = true;
			
			return true;
		}
		return false;
	}
	
	public function isTrue($id, $test, $error)
	{
		if (in_array($id, $this->usedIds))
			throw new Exception('Esse código de erro já foi usado (id: ' . $id . ')');
		
		$this->usedIds[] = $id;
		
		if (!$test)
			$this->addError($id,$error);
		
		return $test;
	}
	
	public function isFalse($id, $test, $error)
	{
		return !$this->isTrue($id, $test, $error);
	}
	
	public function isDefined($id, &$test, $error)
	{
		return $this->isTrue($id, isset($test), $error);
	}
	
	public function isNotEmpty($id, $test, $error)
	{
		return $this->isTrue($id, $test !== '', $error);
	}
	
	public function isInt($id, $test, $error)
	{
		return $this->isTrue($id, $test == 0 || filter_var($test, FILTER_VALIDATE_INT), $error);
	}
	
	public function isFloat($id, $test, $error)
	{
		return $this->isTrue($id, $test == 0 || filter_var($test, FILTER_VALIDATE_FLOAT), $error);
	}
	
	public function isNumericString($id, $test, $error)
	{
		return $this->isTrue($id, preg_match('/^[0-9.]*$/', $test) !== 0, $error);
	}
	
	public function isNotZero($id, $test, $error)
	{
		return $this->isTrue($id, $test != 0, $error);
	}
	
	public function isStrMin($id, $str, $min, $error)
	{
		return $this->isTrue($id, strlen($str) >= $min, $error);
	}
	
	public function isStrMax($id, $str, $max, $error)
	{
		return $this->isTrue($id, strlen($str) <= $max, $error);
	}
	
	public function isStrEq($id, $str, $eq, $error)
	{
		return $this->isTrue($id, strlen($str) == $eq, $error);
	}

	public function isNumRange($id, $str, $min, $max, $error)
	{
		return $this->isTrue($id, ($str >= $min) && ($str <= $max), $error);
	}
	
	public function passedAt()
	{
		if ($this->passedall)
			return true; // atalho
			
		foreach(func_get_args() as $val)
		{
			if (isset($this->erros[$val]))
				return false;
		}
		return true;
	}
	
	public function success()
	{
		return $this->passedall;
	}
	
	public function result()
	{
		return $this->erros;
	}
	
	public function result_html($list_class = 'erros', $item_class = 'erro')
	{		
		$ret = '';
		
		$ret .= '<ul class="' . $list_class . '">';

		foreach($this->erros as $val)
			$ret .= '<li class=' . $item_class . '>' . htmlspecialchars($val) . '</li>';
			
		$ret .= '</ul>';
		
		return $ret;
	}

	public function result_json()
	{
		throw new Exception('Não implementado');
	}
	
	public function count()
	{
		return $this->count;
	}
	
    public function __toString()
    {
        return join(PHP_EOL, $this->erros);
    }
}