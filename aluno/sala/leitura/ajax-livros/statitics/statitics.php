<?php

namespace Readfy\Pdf\statitics;
use Readfy\Pdf\interface\Ajax;
class Statitics implements Ajax{
    public const timetocomplete = 60; //limite em segundos que o usuario precisa ter p/ completar de ler a pagina
    public function __construct(protected \stdClass $data){

    }

    public function run() : void{

        $page_id = $this->data->page_id;
        $livro_id = $this->data->livro_id;
        $sala_id = $this->data->sala_id;
        $current_user = $this->getCurrentUser();

        $porcentagem_atual = $this->getStatistiticsPage($sala_id, $page_id, $livro_id, $current_user);

        if ($porcentagem_atual>=100){

        }else{
            $porcentagem_atual = $porcentagem_atual + ( 1 / self::timetocomplete);
            $this->defineStatistitics($sala_id, $page_id, $livro_id, $porcentagem_atual, $current_user);
        }
       

    }


    //função que retorna a porcentagem da pagina especifica que o usuario esta acessando
    private function getStatistiticsPage($sala_id, $page_id, $livro_id, $usuario_id) : float{
        return 50; //numero de exemplo
    }

    //função que vai atualizar as estaticas em porcentagem da pagina especifica.
    private function defineStatistitics($sala_id, $page_id, $livro_id, $porcentagem, $id_usuario) : void{


    }   

    //função que vai retornar o ID do usuario que esta logado atualmente
    private function getCurrentUser() : int{

        return 1; //id do usuario para exemplo

    }
}
