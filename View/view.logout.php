<?php
require_once __DIR__ . "/../Controller/controller.login.php";
require_once __DIR__ . '/view.header.php';

unset($_SESSION['logged_user']);

header('Location: index.php');

require_once __DIR__ . '/view.footer.php';
