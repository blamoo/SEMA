Sobre
=====

O SEMA (Sistema de Ensaio de Máquinas Agrícolas) foi desenvolvido como projeto de conclusão de curso para o curso de Informática para negócios da Faculdade de Tecnologia de Botucatu pelo graduando Luis Henrique Soler.

O sistema deve ser executado em uma solução de servidor que usa Apache 2.2, PHP 5.3 e MySQL 5.5. O seu funcionamento em ambientes diferentes é meramente acidental.

Estrutra de pastas
==================
Pastas precedidas por _ (underscore) são usadas apenas para o funcionamento da estrutura do sistema, por isso estão ocultas para o acesso público via HTTP, e foram bloqueadas com o uso da diretiva "deny from all" do arquivo `.htaccess` dentro delas. O acesso a elas só é possível pelo sistema de arquivos.

Todas as pastas devem ser referenciadas em código usando constantes definidas no `index.php`.

#### Arquivo index.php
É o ponto de entrada de todas as requisições gerenciadas do software. Esse arquivo define constantes de pastas e URLs, configura o carregamento de classes, gera funções básicas, inicializa variáveis, processa erros nas páginas, etc.

#### Pasta _classes
Contém os arquivos de declaração das classes usadas na aplicação, no formato `<nome>.class.php`. Os nomes de classes devem ser escritos em letras minúsculas e underscore.

Arquivos no formato de `a_<nome>.class.php` são específicos da aplicação (no caso, o SEMA). Os demais arquivos são genéricos e reutilizáveis.

#### Pasta _config
Contém arquivos que armazenam configurações como o usuário e senha do banco de dados e o objeto serializado que armazena as constantes da aplicação.

#### Pasta _layout
Contém arquivos com trechos de código que são incluídos em várias páginas, como o cabeçalho, a definição de tipo do documento (DTD), as folhas de estilo, etc.

#### Pasta _paginas
Contém a estrutura lógica das telas. O ponto de entrada de cada área do sistema deve ser colocado em um arquivo `_main.php`, que acessa a variável `$info_path` e decide qual página carregar.
A preparação dos dados e as decisões de cada página devem ser processadas ANTES do início do envio de texto (na maioria dos casos, antes da inclusão da DTD). Isso permite que os redirecionamentos sejam feitos através de headers HTTP sem a necessidade de armazenamento da saída em um buffer de memória.

#### Pasta _sql
Contém arquivos relacionados à estrutura do banco de dados, como arquivos .sql, atalhos para a página importação, etc.

#### Pasta 3rdparty
Contém bibliotecas de terceiros usadas na aplicação. Se possível, inclua essas bibliotecas usando o recurso de submódulos do git.

#### Pasta css
Contém os arquivos de folha de estilo usados na página. A configuração de estilos para págians específicas deve ser feita com o uso da variável `$document_container_class` no `index.php` que define a classe da div que engloba a página.

#### Pasta img
Contém imagens usadas na página.

#### Pasta js
Contém códigos e bibliotecas JavaScript usados na página.

#### Pastas e aquivos precedidos de `.git`
São arquivos internos do git. Só devem ser alterados por um usuário experiente ou pelo próprio git.

Licenças
========
Ícones
------
These icons are available under a Creative Commons Attribution 3.0 License.

Biblioteca pChart
-----------------
The pChart library and all of its files are released under the GNU General Public License that you can read here. The GPL license allow you to use, modify, redistribute the pChart class into all GPL licensed products. 

Plugin qTip
-----------
Copyright © 2009 Craig Thompson
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. 

Animação GIF de carregamento de páginas
---------------------------------------
ajaxload.info
Code : Yannick Croissant
Design : Kath

Biblioteca PHPWord
------------------
PHPWord is licensed under LGPL (GNU LESSER GENERAL PUBLIC LICENSE)