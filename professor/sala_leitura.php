<!DOCTYPE html>
<html>
<head>
    <style>
        .container {
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
        }

        .book-cover {
            width: 200px; /* Ajuste a largura da capa do livro conforme necessário */
            height: 300px; /* Ajuste a altura da capa do livro conforme necessário */
            border: 1px solid #000;
            margin-right: 20px; /* Espaço entre a capa do livro e os cards dos alunos */
        }

        .student-card {
            width: 150px; /* Ajuste a largura do card do aluno conforme necessário */
            border: 1px solid #000;
            margin-bottom: 10px; /* Espaço entre os cards dos alunos */
            margin-right: 10px; /* Espaço entre os cards dos alunos horizontalmente */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="book-cover">
            <!-- Inclua a imagem da capa do livro aqui -->
            <img src="capa_do_livro.jpg" alt="Capa do Livro" style="width: 100%; height: 100%;" />
        </div>
        <div class="students">
            <?php
            require '../../src/Lib/connect.php';
            require_once("../../src/Lib/Session.php");
            require_once('../../src/Models/Classes/Professor.php');
            require_once('../../src/Models/ClassesDao/ProfessorDao.php')
          
            $professorDao = new ProfessorDao($pdo);
            $professores = $professorDao->selectAll();

            // // Verifica a conexão
            // if ($conn->connect_error) {
            //     die("Falha na conexão com o banco de dados: " . $conn->connect_error);
            // }

            // Consulta para obter os alunos do banco de dados
            // $sql = "SELECT * FROM alunos";
            // $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="student-card">';
                    echo '<h3>' . $row["nome"] . '</h3>';
                    // Outras informações do aluno, se necessário
                    echo '</div>';
                    $count++;
                    // Quebra a linha a cada 4 alunos
                    if ($count % 4 === 0) {
                        echo '<br>';
                    }
                }
            } else {
                echo "Nenhum aluno encontrado.";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
