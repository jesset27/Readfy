<?php

namespace Readfy\Pdf\refresh;

use LivroDao;
use Readfy\Pdf\interface\Ajax;

require_once __DIR__ . "/../../../../../src/Models/ClassesDAO/LivroDao.php";
require_once __DIR__ . "/../../../../../src/Models/Classes/Livro.php";

class Refresh implements Ajax
{
    protected $livro;
    public function __construct(protected \stdClass $data)
    {
        require_once __DIR__ . "/../../../../../src/Lib/connect.php";
        $this->livro = new LivroDao($pdo);
    }

    public function run(): void
    {


        $page_id = $this->data->page_id;
        $livro_id = $this->data->livro_id;
        $path_book = $this->getPathBook($livro_id);

        $this->renderPage($path_book, $page_id);
    }

    //função para pegar o caminho do Livro com base no id
    private function getPathBook(int $idlivro)
    {

        $livroCaminho = $this->livro->selectById($idlivro)->getCaminho();
        return __DIR__ . "/../../../../../public/pdf/" . $livroCaminho;
    }

    //função de renderização da pagina especifica do PDF
    private function renderPage($path, $page_id)
    {
        try {
            $pdf = new \setasign\Fpdi\Fpdi();
            $pdf->AddPage();

            // Defina a página que você deseja abrir
            $pdf->setSourceFile($path);
            $templateId = $pdf->importPage($page_id);

            // Adicione a página ao documento atual
            $pdf->useTemplate($templateId, 10, 10);

            // Salve ou envie a saída do PDF
            $pdf->Output();
        } catch (\Exception $e) {
            echo json_encode(
                [
                    "status" => "error",
                    "msg" => $e->getMessage()
                ]
            );
        }
    }
}
