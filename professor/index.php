 <?php
// require_once("../src/Models/ClassesDAO/SalaDao.php");
// require_once("../src/Models/Classes/Sala.php");
require_once("../src/Lib/connect.php");
require_once("../src/Lib/Session.php");

// $salaDao = new SalaDAO($pdo);
// $sala = new Sala("ADS 1", "Analise e Desenvolvimento de Sistemas", "1234");
// // $salaDao->inserir($sala);
// $salas = $salaDao->buscarTodos();



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>READFY</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/readfy/public/css/style_professor.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Readfy</title>
    
<style>
  /* .table-container {
    display: flex;
    overflow-x: auto; 
  }

  table {
    border-collapse: collapse;
    width: 550px;
  }

  th, td {
    border:1px solid #ccc;
    padding: 5px;
    text-align: left;
    
  }

  th {
    background-color: #666;
    color: white;
    font-weight: bold;
    height: 5px;
  }

  td {
    padding: 10px;
    width: 300px; 
    height: 10px;
  }

  td span {
    display: inline-block;
    width: 40%;
    font-weight: bold;
  } */

  /* button {
    padding: 1px 4px;
    font-weight: bold;
    border-radius: 4px;
  }

  button.edit {
    background-color: #3490dc;
    color: white;
    border: 1px solid #3490dc;
  }

  button.entrar{
    background-color: #70e094;
    color: white;
    border: 1px solid #3490dc;
  }
  

  button.delete {
    background-color: #e53e3e;
    color: white;
    border: 1px solid #e53e3e;
  } */
/*
  body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            text-align: center;
        }
        
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 0 auto;
        }

        label, select, input {
            display: inline-block;
            margin: 10px 0;
            width: 48%; 
        }

        select, input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #555;
        } */

  .table-container {
    display: flex;
    overflow-x: auto; 
  }
</style>
<body>
    <div class="logo">
        <a href=""> <img src="\readfy\public\img\logo6.png "> </a>
    </div>

    <div class="menu">

        <ul>
            <li style="--i: #353bf4; --j:#ea51ff">
                <a href="#">
                  <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Início
                    </span>
                </a>
            </li>
            <li style="--i: #70e094; --j:#99e599">
               <a href="#">
                    <span class="icon">
                        <ion-icon name="library-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Galeria
                    </span>
               </a>
            </li>
            <li style="--i: #ff9966; --j:#ff5e62">
                <a href="/Readfy/professor/sala/criar_sala.php">
                    <span class="icon">
                        <ion-icon name="school-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Criar Sala
                    </span>
                </a>
            </li>
            <li style="--i: #f66333f1; --j:#f434e2">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="cog-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Perfil
                    </span>
                </a>  
                
            </li>

            <li style="--i: #f66333f1; --j:#f434e2">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="exit-outline"></ion-icon>
                    </span>
                    <span class="text">
                        Sair
                    </span>
                </a>  
                
            </li>

        </ul>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<!-- <div class="container-sala">
    <h1>Salas Existentes</h1>
     <!-- <?php foreach ($salas as $sala) { ?>  -->
        
    <?php } ?> -->

</div>
<div class="sala"><h1>Salas de leitura</h1></div>
 <div class="table-container">
    
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Sala</th>
        <th scope="col">Nome Livro</th>
        <th scope="col">Pag.inicial</th>
        <th scope="col">Pag.Final</th>
        <th scope="col">Descrição</th>
        <th scope="col">Prazo leitura</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>O Destino de Perseu</td>
        <td>10</td>
        <td>50</td>
        <td>Valendo 2 pontos</td>
        <td>15/11/2023</td>
        <td>
        <button type="button" class="btn btn-primary">Entrar</button>
        <button type="button" class="btn btn-warning">Alterar</button>
        <button type="button" class="btn btn-danger">Excluir</button>
        </td>
        
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>A cabana</td>
        <td>10</td>
        <td>200</td>
        <td>Resumir o livro</td>
        <td>10/02/2023</td>
        <td>
        <button type="button" class="btn btn-primary">Entrar</button>
        <button type="button" class="btn btn-warning">Alterar</button>
        <button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
      <tr>
      <th scope="row">3</th>
        <td>A casa da colina</td>
        <td>5</td>
        <td>100</td>
        <td>Atividade depois</td>
        <td>15/02/2023</td>
        <td>
        <button type="button" class="btn btn-primary">Entrar</button>
        <button type="button" class="btn btn-warning">Alterar</button>
        <button type="button" class="btn btn-danger">Excluir</button>
        </td>
      </tr>
    </tbody>
  </table>

</div>
</body>
