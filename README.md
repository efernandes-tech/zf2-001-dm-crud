# Zend Framework 2 - DevMedia Artigo - CRUD

##### Anotações:
- Artigo base "http://www.devmedia.com.br/criando-um-crud-com-zend-framework-2-e-doctrine-2/32100".
- Baixar o Skeleton Application clonando do GitHub
	http://framework.zend.com/downloads/skeleton-app
	git clone git://github.com/zendframework/ZendSkeletonApplication.git
- Baixar o "composer.phar" para dentro do projeto
	https://getcomposer.org/composer.phar
- Instalar as dependencias do projeto
	php composer.phar self-update
	php composer.phar install
- Instalar o Doctrine com o Composer
	composer require doctrine/doctrine-orm-module
- Criar pastas dentro da pasta "data"
	DoctrineORMModule/Proxy
- Adicionar no arquivo "config/application.config.php" os modulos que serao carregados
	...
	'modules' => array(
		'Application',
		'DoctrineModule',
		'DoctrineORMModule'
	),
	...
- Criar o formulario basico de adicao de funcionario
	module/Application/view/application/index/index.phtml
- Criar o recebimento dos dados
	module/Application/srs/Application/Controller/IndexController.php
- Criar a classe "Funcionario.php" na pasta "module/Application/srs/Application/Model"
- Configurar a conexao do Doctrine no arquivo "config/autoload/doctrine_orm.local.php"
- Configurar o Doctrine no modulo em "module/Application/config/module.config.php"
- Criar o cadastro de funcionario em "module/Application/src/Application/Controller/IndexControlle.php" 
- Criar um link para a pagina que lista os funcionarios
- Criar a funcao "listarAction()" em "IndexController.php"
- Criar a view "listar.phtml" que exibe a lista de funcionarios
- Criar a rota para edicao e exclusao em "module/Application/config.module.php"
- Criar na view os links para editar e excluir
- Criar as funcoes para editar e excluir
- Criar o arquivo para edicao
	module/Application/view/application/index/editar.phtml
- Desenvolvi a funcionalidade de edicao
