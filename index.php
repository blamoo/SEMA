<?php
session_start(); // Inicia uma sessão com o usuário e inicia a variável $_SESSION
error_reporting(-1); // Evita que o PHP esconda erros, deve ser mduado para 0 quando o sistema estiver no ar

header('Content-Type: text/html;charset=utf-8'); // Cabeçalho HTTP que informa que todos os arquivos serão do tipo text/html com código de caracteres UTF-8
date_default_timezone_set('Etc/GMT+3'); // Define o fuso horário para funções que manipulam datas

/**************/
/* Constantes */
/**************/

define('CLASSES_PATH', '_classes/'); // Pasta de classes
define('PAGES_PATH', '_paginas/'); // Pasta com a estrutura do conteúdo do site
define('CONFIG_PATH', '_config/'); // Pasta com as configurações da aplicação
define('LAYOUT_PATH', '_layout/'); // Pasta para os arquivos comuns do layout
define('THIRDPARTY_PATH', '3rdparty/'); // Pasta para componentes e bibliotecas de terceiros

define('BASE_URL', 'http://localhost/'); // URL base do site, usada na tag <base> e nas outras constantes abaixo

define('PAGE_URL', BASE_URL . 'index.php/'); // URL base para o controlador do site

define('CSS_URL', BASE_URL . 'css/'); // URL base para os arquivos CSS
define('JS_URL', BASE_URL . 'js/'); // URL base para os arquivos JavaScript
define('IMG_URL', BASE_URL . 'img/'); // URL base para a pasta de imagens

/*******************/
/* funções básicas */
/*******************/

 // Função especial do PHP que é chamada sempre que uma classe não-declarada é usada no código.
 // Permite o uso de classes sem a necessidade de um include.
 // As classes devem ser colocadas na pasta definida pela constante CLASSES_PATH e deve estar no formato <nome da classe>.class.php
function __autoload($class)
{
	require(CLASSES_PATH . $class . '.class.php');
}

// Função usada para acessar variáveis que podem não estar definidas, por exemplo índices no $_GET ou no $_POST.
// Caso a variável exista, retorna o valor dela. Caso não exista, retorna o valor do parâmetro $default
// Caso $default não seja definida, retorna false
// Essa função evita erros de execução durante a execução de um arquivo
// Exemplo de uso: $id = $_GET['id'];
function safe(&$var, $default = null)
{
	return isset($var) ? $var : $default;
}

/*************/
/* info_path */
/*************/

// Cria a variável global $info_path, que contém os "pedaços" do caminho digitado após o "index.php" na URL
// Exemplo: http://localhost/index.php/teste/operacao?id=10 retorna um array com os valores array("", "teste", "operacao")
$GLOBALS['info_path'] = explode('/', isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/');


/**************************/
/* Variáveis da aplicação */
/**************************/
 // Configurações da conexão com o banco de dados
include CONFIG_PATH . 'mysql.php';

// Configurações de constantes usadas nos cálculos
a_configurar::carregar();

// Objeto da classe "breadcrumb" que gerencia o caminho de links que aparece no topo das páginas
$bc = new breadcrumb();

// Título das páginas que aparece na tag <title>
$page_title = 'Página sem título';
$write_header = true;

$document_container_class = 'default';

// Arquivos CSS que serão incluídos na no arquivo de layout "head_tag.php"
$css = array();

// Arquivos JavaScipt que serão incluídos na no arquivo de layout "header.php"
$js = array();

/***********/
/* Páginas */
/***********/

// Inclui o arquivo de fluxo das páginas e armazena o resultado retornado na variável $result
$result = require PAGES_PATH . '_main.php';

if ($result !== 1)
	echo $result;
