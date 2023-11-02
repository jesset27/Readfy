<?php
require '../src/Lib/connect.php';
require_once("../src/Lib/Session.php");
require_once('../src/Views/layout/headeradm.php');
Session::defineValor();
?>
<div class="dropdown pb-4">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
        <span class="d-none d-sm-inline mx-1"><?= $usuario->username; ?></span>
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href=" update.php?id= <?= $usuario->id ?> ">Alterar Dados</a></li>
        <li><a class="dropdown-item" href="update.php?id= <?= $usuario->id ?>">Meu Perfil</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../src/Lib/session_destroy.php">Sair</a></li>
    </ul>
</div>
</div>
</div>
<div class="col py-3">
    <h3>Bem Vindo, <?= $usuario->username; ?></h3>
    

    <p class="lead">
        An example 2-level sidebar with collasible menu items. The menu functions like an "accordion" where only a single
        menu is be open at a time. While the sidebar itself is not toggle-able, it does responsively shrink in width on smaller screens.</p>
    <ul class="list-unstyled">
        <li>
            <h5>Responsive</h5> shrinks in width, hides text labels and collapses to icons only on mobile
        </li>
    </ul>


</div>
</div>
</div>
<?php require "../src/Views/layout/footer.php";  ?>