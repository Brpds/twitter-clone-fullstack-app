<?php

namespace App\Controllers;


use MF\Controller\Action;
use MF\Model\Container;



class AppController extends Action{

    public function timeline(){

        $this->validaAuth();

        //recuperar os tweets aqui por ser o endereço do redirecionamento
        $tweet = Container::getModel('Tweet');
        
        $tweet->__set('id_usuario', $_SESSION['id']);
        
        //variáveis de paginação:
        $totalRegistrosPagina = 10;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $deslocamento = ($pagina - 1) * 10;
        //$deslocamento = 0;
        
        //$tweets = $tweet->getAll(); //recupera todos os tweets antes da paginação
        $tweets = $tweet->getPorPagina($totalRegistrosPagina, $deslocamento);
        $total_tweets = $tweet->getTotalRegistros();
        $this->view->totalPaginas = ceil($total_tweets['total'] / $totalRegistrosPagina);
        $this->view->paginaAtiva = $pagina;
        /*echo '<br><br><br>';
        print_r($this->view->totalPaginas);
        print_r($pagina);*/
        $this->view->tweets = $tweets;

        $this->userData();

        $this->render('timeline');
        
    }


    public function tweet(){

        $this->validaAuth();
        
        $tweet = Container::getModel('Tweet');
        $tweet->__set('tweet', $_POST['tweet']);
        $tweet->__set('id_usuario', $_SESSION['id']);
        
        if($tweet->__get('tweet') == ''){
            header('Location: /timeline?erro=vazio');
        }else{
            $tweet->salvar();
            header('Location: /timeline');
        }
    }

    public function deleteTweet(){
        
        $this->validaAuth();

        $id_tweet = isset($_GET['id_tweet']) ? $_GET['id_tweet'] : '';


        $tweet = Container::getModel('Tweet');
        $tweet->__set('id_tweet', $id_tweet);
        $tweet->deleteTweet($id_tweet);
        header('Location: /timeline');

    }

    //autentica o usuário para permitir a visualização
    public function validaAuth(){

        session_start();
        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == ''){
            header('Location: /?login=erro');
        }
    }


    public function quemSeguir(){
        //sempre iniciar páginas restritas com validação de auth
        $this->validaAuth();

        $pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : '';

        $usuarios = array();

        $this->userData();

        if($pesquisarPor != ''){

            $usuario = Container::getModel('Usuario');
            $usuario->__set('nome', $pesquisarPor);
            $usuario->__set('id', $_SESSION['id']);
            $usuarios = $usuario->getAll();
        }


        $this->view->usuarios = $usuarios;
        $this->render('quemSeguir');
    }

    public function acao(){

        $this->validaAuth();

        $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        $id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        $usuario = Container::getModel('Usuario');

        $usuario->__set('id', $_SESSION['id']);

        if($acao == 'seguir'){
            $usuario->seguirUsuario($id_usuario_seguindo);
        }else if($acao == 'deixar_de_seguir'){
            $usuario->deixarSeguirUsuario($id_usuario_seguindo);
        }

        header('Location: /quem_seguir');

    }

    //função que exibe os dados de usuário/followers/tweets no card.
    public function userData(){
        $usuario = Container::getModel('Usuario');

        $usuario->__set('id', $_SESSION['id']);

        //atribuindo o retorno das funções a uma variável para usá-las na view
        $this->view->info_usuario = $usuario->getUserInfo();
        $this->view->total_tweets = $usuario->getTotalTweets();
        $this->view->total_followers = $usuario->getTotalFollowers();
        $this->view->total_following = $usuario->getTotalFollowing();
    }

}


?>  