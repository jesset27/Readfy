<?php
require_once('./Session.php');
$session = new Session();
$session->destruir();
header('Location: /readfy');