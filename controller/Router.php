<?php
// controller/Router.php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = strtolower(rtrim($uri, '/'));
$segments = explode('/', $uri);
$last     = end($segments);

// 1) Route Login
if ($last === 'login') {
    $ctrl = new UserController();
    $ctrl->login();
    exit;
}

// 2) Route Register
if ($last === 'register') {
    $ctrl = new UserController();
    $ctrl->register();
    exit;
}

// fallback vers Register
header('Location: /giftHub/public/index.php/register');
exit;
