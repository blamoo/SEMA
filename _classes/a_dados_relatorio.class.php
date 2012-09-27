<?php

class a_dados_relatorio
{
	public $dados;
	public $trator;
	public function __construct(a_trator $trator)
	{
		$this->trator = $trator;
		$db = db::instance();

		$medicoes = a_medicao::criar_lista_por_trator($trator);

		$this->dados = array();

		foreach($medicoes as $key => $val)
		{
			$this->dados[$val->rpm_motor] = $val;
		}

		ksort($this->dados, SORT_NUMERIC);
	}

	public function url_potencia_torque_tdp()
	{
		$ret = array();
		
		$ret['id_trator'] = $this->trator->id;
		
		$ret['titulo'] = 'Potência e Torque na TDP';
		
		$ret['eixos'][0] = array('nome' => 'Potência TDP (kW - cv)',	'lado' => 'e');
		$ret['eixos'][1] = array('nome' => 'Torque TDP (N.m)',			'lado' => 'd');
		
		$ret['series'][0] = array('nome' => 'kW TDP',	'eixo' => 0, 'dados' => array());
		$ret['series'][1] = array('nome' => 'cv TDP',	'eixo' => 0, 'dados' => array());
		$ret['series'][2] = array('nome' => 'N.m TDP',	'eixo' => 1, 'dados' => array());
		
		foreach ($this->dados as $key => $val)
		{
			$ret['series'][0]['dados'][] = $val->pi_kw_tdp;
			$ret['series'][1]['dados'][] = $val->pi_cv_tdp;
			$ret['series'][2]['dados'][] = $val->ti_nm_tdp;
			
			$ret['abs'][] = $key;
		}

		return $this->url_grafico(http_build_query($ret));
	}
	
	public function validar()
	{
		if (count($this->dados) === 0)
			return false;
		
		return true;
	}
	
	public function url_potencia_torque_motor()
	{
		$ret = array();
		
		$ret['id_trator'] = $this->trator->id;
		
		$ret['titulo'] = 'Potência e Torque no motor';
		
		$ret['eixos'][0] = array('nome' => 'Potência motor (kW - cv)',		'lado' => 'e');
		$ret['eixos'][1] = array('nome' => 'Torque motor (N.m)',			'lado' => 'd');
		
		$ret['series'][0] = array('nome' => 'kW motor',		'eixo' => 0,	'dados' => array());
		$ret['series'][1] = array('nome' => 'cv motor',		'eixo' => 0,	'dados' => array());
		$ret['series'][2] = array('nome' => 'N.m motor',	'eixo' => 1,	'dados' => array());
		
		foreach ($this->dados as $key => $val)
		{
			$ret['series'][0]['dados'][] = $val->pi_kw_motor;
			$ret['series'][1]['dados'][] = $val->pi_cv_motor;
			$ret['series'][2]['dados'][] = $val->ti_nm_motor;
			
			$ret['abs'][] = $key;
		}

		return $this->url_grafico(http_build_query($ret));
	}

	public function url_consumo_combustível_tdp()
	{
		$ret = array();
		
		$ret['id_trator'] = $this->trator->id;
		
		$ret['titulo'] = 'Consumo de combustível  (TDP)';
		
		$ret['eixos'][0] = array('nome' => 'Consumo horário volumétrico (L/h)',		'lado' => 'e');
		$ret['eixos'][1] = array('nome' => 'Consumo específico (g/kWh)',			'lado' => 'd');
		
		$ret['series'][0] = array('nome' => 'Ch L/h',		'eixo' => 0,	'dados' => array());
		$ret['series'][1] = array('nome' => 'Cs g/kWh',		'eixo' => 1,	'dados' => array());
		
		foreach ($this->dados as $key => $val)
		{
			$ret['series'][0]['dados'][] = $val->cc_chv;
			$ret['series'][1]['dados'][] = $val->cc_cs;
			
			$ret['abs'][] = $key;
		}

		return $this->url_grafico(http_build_query($ret));
	}
	
	public function url_grafico($qs)
	{
		return PAGE_URL . 'grafico/imagem?' . $qs;
	}
}