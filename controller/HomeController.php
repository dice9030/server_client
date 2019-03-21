<?php

$this->respond(
    'GET', '/?',
    function ($request, $response, $service) {

        if(isset($_SESSION["token"])) {
            
            echo $service->twig->render(
                'index.twig',
                [
                    'token' => $_SESSION["token"],
                    'aud' => $service->aud->get()
                ]
            );

        } else {
            $response->redirect('/site/iniciar-sesion')->send();
        }

    }

);