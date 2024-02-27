# Twitter Clone

## Descrição:

### Esta é uma aplicação fullstack desenvolvida no curso *Desenvolvimento Web Completo* da Udemy, ministrado por Jorge Santana e Jamilton Damasceno. Dito curso ensina PHP como linguagem backend e MySQL como database.

### Neste projeto, passamos pelos principais conceitos de desenvolvimento web, com foco em PHP, enquanto o frontend foi construído apenas para ser útil, sem muita atenção às estilizações, com classes simples do Bootstrap

## Do que este App é capaz?
### Este app é capaz de fazer operações básicas do (agora X) Twitter:

***1 - Registro/Validação de Usuários***
***2 - Seguir/Deixar de seguir usuários***
***3 - Postagens de usuários(criar e deletar)***
***4 - Busca de usuários por nome***

### Há uma lista TODO para implementações futuras.

### A aplicação completa será publicada posteriormente em um site para testes:

[{not_yet_implemented}]


## Configuração de Ambiente (modo mais simples):

### Após instalar o Apache e o MySQL via XAMPP (linhas NN-MM), inicie ambos os serviços e crie o banco de dados acessando o endereço:

[{http://localhost/phpmyadmin/index.php}]

### No banco de dados, aba SQL, cole as queries das linhas 74-96 e execute.

## Configure o PHP executável como uma variável de ambiente (como explicado nas linhas 51-59)

## no terminal, vá até a pasta twitter_clone/public e execute o comando: 

php -S localhost:8080

## Isso permitirá que o servidor HTTP embutido no PHP funcione na porta selecionada. Acesse o endereço [{localhost:8080}] e o projeto deve funcionar. Atenção: Apache e MySQL devem estar inicializados no XAMPP para que o projeto funcione.

## Configuração de ambiente para deploy local:

### Se você é um dev, muito provavelmente tem um editor de código à disposição. Este projeto foi desenvolvido por completo usando VSCode no Windows, portanto, a configuração será descrita para ser feita no referido OS. Planejo postar as instalações para MAC e Linux posteriormente

## Ferramentas:
***OS: Windows***
***VSCode***
***XAMPP - minha versão é a v3.3.0, em [{https://www.apachefriends.org/}]***

## XAMPP instalação: bem direta, clique no executável de instalação do XAMPP e quando a seleção de pacotes aparecer, selecione Apache, MySQL, PHP, PHPMyAdmin, e mantenha os diretórios padrão, e permita que o Apache acesse permissões através do firewall. Terminada a instalação, certifique-se de iniciar ambos os serviços: Apache and MySQL on XAMPP e as portas serão 80 and 443 para o Apache e 3306 para o MySQL.

## //lembrete: Versões recentes do PHP tem embutidas um servidor de requisições HTTP, então, para carregar a aplicação, uma nova variável de ambiente deve ser configurada

## no menu de configurações, clique em configurações avançadas de sistema, depois em Variáveis de Ambiente (pode ser simplificado digitando Envi na barra de pesquisa do windows 7 ou superior), clique em Path, Novo, e adicione o caminho de instalação do PHP. Se o caminho padrão foi mantido, provavelmente o caminho é C:\xampp\php

## Com a variável de ambiente configurada, podemos executar comandos PHP de qualuqer lugar via terminal. Para testar se a configuração funcionou, digite no terminal: 

php -version

## Deve mostrar a versão PHP instalada //fim do lembrete

# Configuração da Aplicação (Segunda opção):

## inicie os serviços Apache e MySQL no XAMPP 

## vá para o endereço

[{http://localhost/phpmyadmin/index.php}]

## Clique na aba SQL, copie, cole e então execute a seguinte Query para configurar o banco de dados:

<details>
<summary>Queries para o banco de dados</summary>

create database twitter_clone;

use twitter_clone;

create table usuarios(
	id int not null primary key AUTO_INCREMENT,
	nome varchar(100) not null,
	email varchar(150) not null,
	senha varchar(32) not null
);

create table tweets(
	id int not null PRIMARY KEY AUTO_INCREMENT,
	id_usuario int not null,
	tweet varchar(140) not null,
	data datetime default current_timestamp
);

create table usuarios_seguidores(
	id int not null primary key auto_increment,
	id_usuario int not null,
	id_usuario_seguindo int not null
);
</details>


## Abra a pasta do XAMPP, procure pela pasta htdocs, e dentro dela, crie uma nova pasta para backup e cole todo o conteúdo dentro de htdocs dentro desta pasta de backup.

## então, vá para a pasta twitter_clone/public, copie todas as pastas e arquivos (css, img, .htaccess, index) para dentro da pasta htdocs. Este é o conteúdo público de acesso para o usuário

## agora, dentro da pasta do XAMPP, no mesmo nível da pasta htdocs, crie uma nova pasta chamada twitter_clone, e cole todas as pastas do projeto (exceto a pasta public) dentro desta nova pasta.

## ajuste os caminhos para o arquivo vendor no arquivo index.php (dentro de htdocs) de:

require_once "../vendor/autoload.php";

## para

require_once "../twitter_clone/vendor/autoload.php";

## então, ajuste o caminho na linha 33 no arquivo Action.php na pasta C:\xampp\twitter_clone\vendor\MF\Controller\Action.php de:

require_once "../App/views/". $classeAtual . "/". $this->view->page .".phtml";

## para:

require_once "../twitter_clone/App/views/". $classeAtual . "/". $this->view->page .".phtml";

## então, ajuste os caminhos no mesmo arquivo, linhas 19 e 20 para:

"../twitter_clone/App/Views/" . $layout . ".phtml"

***e***

require_once "../twitter_clone/App/Views/" . $layout . ".phtml";

## finalmente, abra o endereço localhost e a aplicação deve funcionar. 

## Caso algum erro apareça, sinta-se à vontade para abrir um Issue aqui no repositório.