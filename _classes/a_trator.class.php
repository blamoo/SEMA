<?php

class a_trator
{
	public $id;
	public $nome;
	public $rotacao_nominal_motor;
	public $rotacao_maxima_livre;
	public $relacao_transmissao_motor;
	public $relacao_transmissao_ventilador;
	public $horas_trator;
	public $aspiracao;
	public $densidade_combustivel;
	public $poder_calorifico;

	public static function criar_por_id($id)
	{
		$db = db::instance();

		$data = $db->get_row('SELECT * FROM `trator` WHERE `id` = ?;', $id);

		if ($data === false)
			return null;

		$ret = self::criar_por_array($data);

		return $ret;
	}

	public static function criar_por_array($array)
	{
		$ret = new a_trator();

		if (!is_array($array))
			return null;

		object_helper::map($array, $ret, true);

		return $ret;
	}

	public static function criar_lista()
	{
		$db = db::instance();

		$data = $db->get_row_list('SELECT `nome`, `id` FROM `trator`;');

		$ret = array();

		foreach($data as $key => $val)
		{
			$ret[$key] = a_trator::criar_por_array($val);
		}

		return $ret;
	}

	public function existe()
	{
		$db = db::instance();

		$count = $db->get_count('SELECT NULL FROM `trator` WHERE `id` = ?;', $this->id);

		return $count !== 0;
	}

	public function validar($operacao, tester $tester)
	{
		if($operacao !== 'insert')
		{
			$tester->isTrue(100, $this->existe(), 'O trator selecionado não existe no banco de dados');

			if ($operacao === 'delete')
				return;
		}

		if ($tester->success())
		{
			$tester->isNotEmpty(201, $this->nome, 								'O campo "Nome" está vazio');
			$tester->isNotEmpty(202, $this->rotacao_nominal_motor, 				'O campo "Rotação nominal do motor" está vazio');
			$tester->isNotEmpty(203, $this->rotacao_maxima_livre, 				'O campo "Rotação máxima livre" está vazio');
			$tester->isNotEmpty(204, $this->relacao_transmissao_motor, 			'O campo "Relação de transmissão Motor/TDP" está vazio');
			$tester->isNotEmpty(205, $this->relacao_transmissao_ventilador,		'O campo "Relação de transmissão Ventilador/motor" está vazio');
			$tester->isNotEmpty(206, $this->horas_trator, 						'O campo "Horas do trator" está vazio');
			$tester->isNotEmpty(207, $this->aspiracao, 							'O campo "Aspiração" está vazio');
			$tester->isNotEmpty(208, $this->densidade_combustivel, 				'O campo "Densidade combustível" está vazio');
			$tester->isNotEmpty(209, $this->poder_calorifico, 					'O campo "Poder calorífico" está vazio');
		}
		
		if ($tester->success())
		{
			$tester->isNumericString(212, $this->rotacao_nominal_motor, 			'O campo "Rotação nominal do motor" deve ser um número válido');
			$tester->isNumericString(213, $this->rotacao_maxima_livre, 				'O campo "Rotação máxima livre" deve ser um número válido');
			$tester->isNumericString(214, $this->relacao_transmissao_motor, 		'O campo "Relação de transmissão Motor/TDP" deve ser um número válido');
			$tester->isNumericString(215, $this->relacao_transmissao_ventilador,	'O campo "Relação de transmissão Ventilador/motor" deve ser um número válido');
			$tester->isNumericString(216, $this->horas_trator, 						'O campo "Horas do trator" deve ser um número válido');
			$tester->isNumericString(218, $this->densidade_combustivel, 			'O campo "Densidade combustível" deve ser um número válido');
			$tester->isNumericString(219, $this->poder_calorifico, 					'O campo "Poder calorífico" deve ser um número válido');
		}
		
		if ($tester->success())
		{
			$tester->isStrMax	(301, $this->nome, 100,							'O campo "Nome" não pode ter mais de 100 caracteres');
			$tester->isInt		(302, $this->rotacao_nominal_motor, 			'O campo "Rotação nominal do motor" deve ser um número inteiro válido');
			$tester->isInt		(303, $this->rotacao_maxima_livre, 				'O campo "rotacao_maxima_livre" deve ser um número inteiro válido');
			$tester->isFloat	(304, $this->relacao_transmissao_motor, 		'O campo "Relação de transmissão Motor/TDP" deve ser um número válido');
			$tester->isFloat	(305, $this->relacao_transmissao_ventilador,	'O campo "Relação de transmissão Ventilador/motor" deve ser um número válido');
			$tester->isFloat	(306, $this->horas_trator, 						'O campo "Horas do trator" deve ser um número válido');
			$tester->isStrMax	(307, $this->aspiracao, 100,					'O campo "Aspiração" não pode ter mais de 100 caracteres');
			$tester->isFloat	(308, $this->densidade_combustivel, 			'O campo "Densidade combustível" deve ser um número válido');
			$tester->isFloat	(309, $this->poder_calorifico, 					'O campo "Poder calorífico" deve ser um número válido');
		}

		if ($tester->success())
		{
			$tester->isNumRange	(402, $this->rotacao_nominal_motor,				0, 9999,			'O campo "Rotação nominal do motor" ser um número entre 0 e 9999');
			$tester->isNumRange	(403, $this->rotacao_maxima_livre,				0, 9999,			'O campo "rotacao_maxima_livre" ser um número entre 0 e 9999');
			$tester->isNumRange	(404, $this->relacao_transmissao_motor,			0, 999999.999,		'O campo "Relação de transmissão Motor/TDP" ser um número entre 0 e 999999.999');
			$tester->isNumRange	(405, $this->relacao_transmissao_ventilador,	0, 999999.999,		'O campo "Relação de transmissão Ventilador/motor" ser um número entre 0 e 999999.999');
			$tester->isNumRange	(406, $this->horas_trator,						0, 999999.999,		'O campo "Horas do trator" ser um número entre 0 e 999999.999');
			$tester->isNumRange	(408, $this->densidade_combustivel,				0, 999999.999,		'O campo "Densidade combustível" ser um número entre 0 e 999999.999');
			$tester->isNumRange	(409, $this->poder_calorifico,					0, 999999.999,		'O campo "Poder calorífico" ser um número entre 0 e 999999.999');
		}
	}

	public function salvar()
	{
		$db = db::instance();

		$resultado = $db->query('REPLACE INTO
		`trator` (`id`, `nome`, `rotacao_nominal_motor`, `rotacao_maxima_livre`, `relacao_transmissao_motor`, `relacao_transmissao_ventilador`, `horas_trator`, `aspiracao`, `densidade_combustivel`, `poder_calorifico`)
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);', array(
		$this->id,
		$this->nome,
		$this->rotacao_nominal_motor,
		$this->rotacao_maxima_livre,
		$this->relacao_transmissao_motor,
		$this->relacao_transmissao_ventilador,
		$this->horas_trator,
		$this->aspiracao,
		$this->densidade_combustivel,
		$this->poder_calorifico
		));

		if (!$resultado)
			throw new RuntimeException('Erro durante operação com banco de dados');
	}

	public function excluir()
	{
		$db = db::instance();

		$resultado = $db->query('DELETE FROM `trator` WHERE `id` = ?;', $this->id);

		if (!$resultado)
			throw new RuntimeException('Erro durante operação com banco de dados');

		$this->id = null;
	}

	public function url_detalhes()
	{
		return PAGE_URL . 'trator/detalhes?id=' . $this->id;
	}

	public function url_alterar()
	{
		return PAGE_URL . 'trator/adicionar?id=' . $this->id;
	}

	public function url_excluir()
	{
		return PAGE_URL . 'trator/excluir?id=' . $this->id;
	}

	public function url_medicao_lista()
	{
		return PAGE_URL . 'trator/medicao/lista?id_trator=' . $this->id;
	}

	public function url_medicao_adicionar()
	{
		return PAGE_URL . 'trator/medicao/adicionar?id_trator=' . $this->id;
	}

	public function url_medicao_recalcular()
	{
		return PAGE_URL . 'trator/medicao/recalcular?id_trator=' . $this->id;
	}

	public function url_medicao_operacoes($operacao)
	{
		return PAGE_URL . 'trator/medicao/operacoes?id_trator=' . $this->id . '&operacao=' . $operacao;
	}

	public function url_relatorio_resumo()
	{
		return PAGE_URL . 'trator/relatorio/resumo?id_trator=' . $this->id;
	}

	public function url_relatorio_download()
	{
		return PAGE_URL . 'trator/relatorio/download?id_trator=' . $this->id;
	}

	public static function url_lista()
	{
		return PAGE_URL . 'trator';
	}

	public static function url_adicionar()
	{
		return PAGE_URL . 'trator/adicionar';
	}

	public static function url_operacoes($operacao)
	{
		return PAGE_URL . 'trator/operacoes?operacao=' . $operacao;
	}
}