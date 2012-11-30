<?php
switch(safe($info_path[2]))
{
	case 'imagem':		return require PAGES_PATH . 'grafico/imagem.php';
	//case 'curva':		return require PAGES_PATH . 'grafico/curva.php';
	
	default: return new a_http_erro(404);
}