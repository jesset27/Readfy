 <?php
  require_once("../src/Lib/connect.php");
  require_once("../src/Lib/Session.php");
  require_once("../src/Models/Classes/Sala.php");
  require_once("../src/Models/ClassesDAO/SalaDao.php");
  $salaDao = new SalaDao($pdo);
  $session = new Session();
  $salas = $salaDao->selectAllByIdProfessor();
  if ($session->obter('professor') == null) {
    header("Location: ../login.php");
  }
  ?>
 <!DOCTYPE html>
 <html lang='pt-br'>

 <head>
   <meta charset='utf-8'>
   <meta http-equiv='X-UA-Compatible' content='IE=edge'>
   <title>READFY</title>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' type='text/css' media='screen' href='/readfy/public/css/style_professor.css'>
   <script src='main.js'></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <title>Readfy</title>
 </head>

 <body>
   <div class="logo">
     <a href="">
       <img src="\readfy\public\img\logo6.png" alt="logo">
     </a>
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
         <a href="../src/Lib/session_destroy.php">
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


   <div class="sala">
     <h1>Salas de leitura</h1>
   </div>
   <div class="table-container">

     <table class="table table-hover">
       <thead>
         <tr>
           <th scope="col">Sala</th>
           <th scope="col">Codigo</th>
           <th scope="col">Nome</th>
           <th scope="col">Pag.inicial</th>
           <th scope="col">Pag.Final</th>
           <th scope="col">Descrição</th>
           <th scope="col">Prazo leitura</th>
           <th scope="col">Ação</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($salas as $sala) { ?>

           <tr>
             <td scope="row"><?= $sala->getId(); ?></td>
             <td><?= $sala->getCodigo(); ?></td>
             <td><?= $sala->getNome(); ?></td>
             <td><?= $sala->getPaginaInicial(); ?></td>
             <td><?= $sala->getPaginaFinal(); ?></td>
             <td><?= $sala->getDescricao(); ?></td>
             <td><?= $sala->getPrazo(); ?></td>
             <td>
               <a href="./sala/sala.php?id=<?= $sala->getId();?>">
                 <button type="button" class="btn btn-primary">Entrar</button>
               </a>
               <a href="./sala/update_sala.php?id=<?= $sala->getId() ?>">
                 <button type="button" class="btn btn-warning bi bi-pencil-square"></button>
               </a>
               <button class="bi bi-trash3-fill btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?= $sala->getId(); ?>"></button>
             </td>
           </tr>

           <div class="modal fade" id="modal<?= $sala->getId(); ?>" tabindex="-1" aria-labelledby="modalLabel<?= $sala->getId(); ?>" aria-hidden="true">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h1 class="modal-title fs-5" id="modalLabel<?= $sala->getId(); ?>">Excluir Sala?</h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                   Deseja realmente excluir a sala <?= $sala->getNome(); ?>?
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                   <a href="./sala/destroy_sala.php?id=<?= $sala->getId(); ?>">
                     <button type="button" class="btn btn-danger">Sim</button>
                   </a>
                 </div>
               </div>
             </div>
           </div>
         <?php } ?>
       </tbody>
     </table>

   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>