<?php
require_once __DIR__ . "/Controller/controller.login.php";
require_once __DIR__ . '/header.php';

unset($_SESSION['logged_user']);

header('Location: index.php');

require_once __DIR__ . '/footer.php';
