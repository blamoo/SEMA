<?php

$bc->add(PAGE_URL, 'Página Inicial');

switch(safe($info_path[1]))
{
	case '': case 'home': 	return require PAGES_PATH . 'home/_main.php';
	case 'trator': 			return require PAGES_PATH . 'trator/_main.php';
	case 'grafico': 			return require PAGES_PATH . 'grafico/_main.php';
	
	default: return new a_http_erro(404);
}