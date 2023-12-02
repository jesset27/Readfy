<?php
namespace Readfy\Pdf\statitics;
use Readfy\Pdf\interface\Ajax;
require_once __DIR__."/../../../../../src/Models/ClassesDAO/LeituraDao.php";
require_once __DIR__."/../../../../../src/Lib/Session.php";
class Statitics implements Ajax{
    
    protected $leituraDao;
    protected $session;
    public const timetocomplete = 60; //limite em segundos que o usuario precisa ter p/ completar de ler a pagina
    public function __construct(protected \stdClass $data){
        require_once __DIR__."/../../../../../src/Lib/connect.php";
        $this->leituraDao = new \LeituraDao($pdo);
        $this->session = new \Session();
    }

    public function run() : void{

        $page_id = (int) $this->data->page_id;
        $livro_id = (int) $this->data->livro_id;
        $sala_id = (int) $this->data->sala_id;
        $current_user = (int) $this->getCurrentUser();
        $porcentagem_atual = (float) $this->getStatistiticsPage($sala_id, $page_id, $livro_id, $current_user);
        if ($porcentagem_atual>=100){

        }else{
            $porcentagem_atual = $porcentagem_atual + ( 1 / self::timetocomplete) *100;
            $porcentagem_atual = number_format($porcentagem_atual,'2', '.', '');
            var_dump($porcentagem_atual);
            $this->defineStatistitics($sala_id, $page_id, $livro_id, $porcentagem_atual, $current_user);
        }
       

    }


    //função que retorna a porcentagem da pagina especifica que o usuario esta acessando
    private function getStatistiticsPage($sala_id, $page_id, $livro_id, $usuario_id) : float{

        //defini a pagina que o usuario esta atualmente
        $this->session->definir("pagina_atual", $page_id);
        
        $page_data = $this->leituraDao->getSpecifPage((int) $sala_id, (int) $usuario_id, (int) $livro_id, (int) $page_id);
        if ( $page_data != null ){
            return $page_data->porcentagem;
        }else{

            $this->leituraDao->insert((int) $page_id, (int) $sala_id, (int) $livro_id, (int) $usuario_id);
            return 0; //numero de exemplo
        }


    }

    //função que vai atualizar as estaticas em porcentagem da pagina especifica.
    private function defineStatistitics($sala_id, $page_id, $livro_id, $porcentagem, $id_usuario) : void{

        $this->leituraDao->update((int) $page_id, (int) $sala_id, (int) $livro_id, (int) $id_usuario, (int)$porcentagem);

    }

    //função que vai retornar o ID do usuario que esta logado atualmente
    private function getCurrentUser() : int{

        return (int) $this->session->obter("aluno");

    }
}
