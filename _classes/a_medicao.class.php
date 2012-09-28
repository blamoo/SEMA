<?php

class a_medicao
{
	public $id;
	
	public $id_trator;
	
	public $rpm_motor;
	public $rpm_tdp;
	public $rpm_ventilador;
	
	public $fm_clp_1;
	public $fm_clp_2;
	
	public $chv_clp_1;
	public $chv_clp_2;
	
	public $dados_forca;
	public $dados_braco = A_DADOS_BRACO;
	public $dados_fator_correcao = A_FATOR_CORRECAO;
	
	public $pi_kw_tdp;
	public $pi_cv_tdp;
	public $pi_kw_motor;
	public $pi_cv_motor;
	
	public $ti_kgfm_tdp;
	public $ti_nm_tdp;
	public $ti_kgfm_motor;
	public $ti_nm_motor;
	
	public $cc_chv;
	public $cc_chm;
	public $cc_cs;
	
	public $consumo_energetico;
	public $eficiencia_termica;
	public $energia_especifica;
	
	private $trator;
	
	public static function criar_por_id($id)
	{
		$db = db::instance();
		
		$data = $db->get_row('SELECT * FROM `medicao` WHERE `id` = ?;', $id);
		
		if ($data === false)
			return null;
		
		$ret = self::criar_por_array($data);
		
		return $ret;
	}
	
	public static function criar_por_array($array)
	{
		$ret = new a_medicao();
		
		if (!is_array($array))
			return null;
		
		object_helper::map($array, $ret, true);
		
		return $ret;
	}
	
	public static function criar_lista_por_trator(a_trator $trator)
	{
		$db = db::instance();
		
		$data = $db->get_row_list('SELECT * FROM `medicao` WHERE `id_trator` = ?;', $trator->id);
		
		$ret = array();
		
		foreach($data as $key => $val)
		{
			$ret[$key] = a_medicao::criar_por_array($val);
			$ret[$key]->set_trator($trator);
		}
		
		return $ret;
	}
	
	public function existe()
	{
		$db = db::instance();
		
		$count = $db->get_count('SELECT NULL FROM `medicao` WHERE `id` = ?;', $this->id);
		
		return $count !== 0;
	}
	
	public function set_trator(a_trator $trator)
	{
		if ($this->trator !== null)
			throw new RuntimeException('set_trator() não deve ser usado caso já exista um trator no objeto');
		
		$this->id_trator = $trator->id;
		$this->trator = $trator;
	}
	
	public function get_trator()
	{
		if ($this->id_trator === false)
			throw new RuntimeException('A medição não está associada a um trator');
		
		if (!($this->trator instanceof a_trator))
			throw new RuntimeException('Propriedade $trator não é um objeto a_trator válido');
		
		if ($this->trator === null)
			return $this->trator = a_trator::criar_por_id($this->id_trator);
		
		return $this->trator;
	}
	
	public function validar($operacao, tester $tester)
	{
		if($operacao !== 'insert')
		{
			$tester->isTrue(100, $this->existe(), 'A medição selecionada não existe no banco de dados');
			
			if ($operacao === 'delete')
				return;
		}
		
		if ($tester->success())
		{
			$tester->isNotEmpty(201, $this->rpm_motor, 		'Preencha o campo "Rotações do Motor"');
			$tester->isNotEmpty(202, $this->fm_clp_1, 		'Preencha o campo "Força medida 1"');
			$tester->isNotEmpty(203, $this->fm_clp_2, 		'Preencha o campo "Força medida 2"');
			$tester->isNotEmpty(204, $this->chv_clp_1,		'Preencha o campo "Chv 1"');
			$tester->isNotEmpty(205, $this->chv_clp_2, 		'Preencha o campo "Chv 2"');
			$tester->isNotEmpty(206, $this->dados_braco, 	'Preencha o campo "Braço"');
			$tester->isNotEmpty(207, $this->dados_fator_correcao, 	'Preencha o campo "Fator de correção da força"');
		}

		if ($tester->success())
		{
			$tester->isInt		(301, $this->rpm_motor, 			'O campo "Rotações do Motor" deve ser um número inteiro válido');
			$tester->isInt		(302, $this->fm_clp_1, 				'O campo "Força medida 1" deve ser um número inteiro válido');
			$tester->isInt		(303, $this->fm_clp_2, 				'O campo "Força medida 2" deve ser um número inteiro válido');
			$tester->isFloat	(304, $this->chv_clp_1, 			'O campo "Chv 1" deve ser um número válido');
			$tester->isFloat	(305, $this->chv_clp_2,				'O campo "Chv 2" deve ser um número válido');
			$tester->isFloat	(306, $this->dados_braco,			'O campo "Braço" deve ser um número válido');
			$tester->isFloat	(307, $this->dados_fator_correcao,	'O campo "Fator de correção da força" deve ser um número válido');
		}

		if ($tester->success())
		{
			$tester->isNumRange	(401, $this->rpm_motor,				0, 9999,					'O campo "Rotações do Motor" ser um número entre 0 e 9999');
			$tester->isNumRange	(402, $this->fm_clp_1,				0, 9999,					'O campo "Força medida 1" ser um número entre 0 e 9999');
			$tester->isNumRange	(403, $this->fm_clp_2,				0, 9999,					'O campo "Força medida 2" ser um número entre 0 e 9999');
			$tester->isNumRange	(404, $this->chv_clp_1,				0, 999999.999,				'O campo "Chv 1" ser um número entre 0 e 999999.999');
			$tester->isNumRange	(405, $this->chv_clp_2,				0, 999999.999,				'O campo "Chv 2" ser um número entre 0 e 999999.999');
			$tester->isNumRange	(406, $this->dados_braco,			0, 999999.999,				'O campo "Braço" ser um número entre 0 e 999999.999');
			$tester->isNumRange	(407, $this->dados_fator_correcao,	0, 999999.999,				'O campo "Fator de correção da força" ser um número entre 0 e 999999.999');
		}
	}
	
	public function calcular()
	{
		$trator = $this->get_trator();
		
		$this->rpm_tdp = $this->rpm_motor / $trator->relacao_transmissao_motor;
		$this->rpm_ventilador = $this->rpm_motor * $trator->relacao_transmissao_ventilador;
		
		$this->dados_forca = (($this->fm_clp_1 + $this->fm_clp_2) / 2) / $this->dados_fator_correcao;
		$this->ti_kgfm_tdp = $this->dados_braco * $this->dados_forca;
		
		$this->pi_kw_tdp = ($this->rpm_tdp * $this->ti_kgfm_tdp) / 974;
		$this->pi_cv_tdp = ($this->rpm_tdp * $this->ti_kgfm_tdp) / 716.2;
		
		$this->pi_kw_motor = $this->pi_kw_tdp / 0.9;
		$this->pi_cv_motor = $this->pi_cv_tdp / 0.9;
		
		$this->ti_nm_tdp = $this->ti_kgfm_tdp * 9.81;
		
		$this->ti_kgfm_motor = ($this->ti_kgfm_tdp / $trator->relacao_transmissao_motor) / 0.9;
		$this->ti_nm_motor = ($this->ti_nm_tdp / $trator->relacao_transmissao_motor) / 0.9;
		
		$this->cc_chv = ($this->chv_clp_1 + $this->chv_clp_2) / 2;
		
		$this->cc_chm = $this->cc_chv * $trator->densidade_combustivel;
		$this->cc_cs = $this->cc_chm * 1000 / $this->pi_kw_tdp;
		
		$this->consumo_energetico = $this->cc_chm * $trator->poder_calorifico;
		$this->eficiencia_termica = (3600 / ($this->cc_cs * $trator->poder_calorifico)) * 100;
		
		$this->energia_especifica = $this->pi_kw_tdp / $this->cc_chv;
	}
	
	public function salvar()
	{
		$db = db::instance();
		
		$resultado = $db->query('REPLACE INTO 
		`medicao` (`id`, `id_trator`, `rpm_motor`, `rpm_tdp`, `rpm_ventilador`, `fm_clp_1`, `fm_clp_2`, `chv_clp_1`, `chv_clp_2`, `dados_forca`, `dados_braco`, `dados_fator_correcao`, `pi_kw_tdp`, `pi_cv_tdp`, `pi_kw_motor`, `pi_cv_motor`, `ti_kgfm_tdp`, `ti_nm_tdp`, `ti_kgfm_motor`, `ti_nm_motor`, `cc_chv`, `cc_chm`, `cc_cs`, `consumo_energetico`, `eficiencia_termica`, `energia_especifica`)
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);', array(
		$this->id,
		$this->id_trator,
		$this->rpm_motor,
		$this->rpm_tdp,
		$this->rpm_ventilador,
		$this->fm_clp_1,
		$this->fm_clp_2,
		$this->chv_clp_1,
		$this->chv_clp_2,
		$this->dados_forca,
		$this->dados_braco,
		$this->dados_fator_correcao,
		$this->pi_kw_tdp,
		$this->pi_cv_tdp,
		$this->pi_kw_motor,
		$this->pi_cv_motor,
		$this->ti_kgfm_tdp,
		$this->ti_nm_tdp,
		$this->ti_kgfm_motor,
		$this->ti_nm_motor,
		$this->cc_chv,
		$this->cc_chm,
		$this->cc_cs,
		$this->consumo_energetico,
		$this->eficiencia_termica,
		$this->energia_especifica
		));
		
		if (!$resultado)
			throw new RuntimeException('Erro durante operação com banco de dados');
	}
	
	public function excluir()
	{
		$db = db::instance();
		
		$resultado = $db->query('DELETE FROM `medicao` WHERE `id` = ?;', $this->id);
		
		if (!$resultado)
			throw new RuntimeException('Erro durante operação com banco de dados');
		
		$this->id = null;
	}
	
	public function nome()
	{
		return 'Medição Nº ' . $this->id;
	}
	
	public function url_detalhes()
	{
		return PAGE_URL . 'trator/medicao/detalhes?id=' . $this->id . '&id_trator=' . $this->id_trator;
	}
	
	public function url_alterar()
	{
		return PAGE_URL . 'trator/medicao/adicionar?id=' . $this->id . '&id_trator=' . $this->id_trator;
	}

	public function url_excluir()
	{
		return PAGE_URL . 'trator/medicao/excluir?id=' . $this->id . '&id_trator=' . $this->id_trator;
	}
}
/*
id							Id
id_trator					Trator
rpm_motor					Rotações - Motor (rpm)
rpm_tdp						Rotações - TDP (rpm)
rpm_ventilador				Rotações - Ventilador (rpm)
fm_clp_1					Força medida - Medição 1
fm_clp_2					Força medida - Medição 2
chv_clp_1					Chv (L.h-1) - Medição 1
chv_clp_2					Chv (L.h-1) - Medição 2
dados_forca					Dados - Força (kgf)
dados_braco					Dados - Braço (m)
dados_fator_correcao		Dados - Fator de correção da força
pi_kw_tdp					Potência indicada - kW TDP
pi_cv_tdp					Potência indicada - cv TDP
pi_kw_motor					Potência indicada - kW Motor
pi_cv_motor					Potência indicada - cv Motor
ti_kgfm_tdp					Torque indicado - kgf.m TDP
ti_nm_tdp					Torque indicado - N.m TDP
ti_kgfm_motor				Torque indicado - kgf.m Motor
ti_nm_motor					Torque indicado - N.m Motor
cc_chv						Consumo de combustível - Chv(L.h^-1)
cc_chm						Consumo de combustível - Chm (kg.h^-1)
cc_cs						Consumo de combustível - Cs (g.kWh^-1)
consumo_energetico			Consumo energético (MJ.h^-1)
eficiencia_termica			Eficiência (%)
energia_especifica			Energia específica (kWh.L^-1)
*/