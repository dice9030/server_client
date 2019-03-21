<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../vendor/autoload.php');

error_reporting(E_ERROR);
@session_start();

date_default_timezone_set('America/Lima');

$dotenv = new Dotenv\Dotenv(__DIR__, '../.env');
$dotenv->load();

$klein = new \Klein\Klein();

$loader = new \Twig_Loader_Filesystem('../resources/views');
$twig = new \Twig_Environment($loader);

$aud = new AUD();

$klein->respond(
    function ($request, $response, $service) use ($klein, $twig, $aud) {
        $service->twig = $twig;
        $service->aud = $aud;
    }
);

$klein->with("/", "../controller/HomeController.php");
$klein->with("/site", "../controller/SiteController.php");

$klein->respond(
    '404',
    function ($request, $response, $service) {
        echo $service->twig->render('404.twig');
    }
);

$klein->dispatch();