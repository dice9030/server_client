<?php 

$this->respond(
    'GET', '/iniciar-sesion',
    function ($request, $response, $service) {



		$curl = new Curl\Curl();
		$curl->setBasicAuthentication('RANTORNW', 'FOL415181');
		$curl->setUserAgent('');
		$curl->setReferrer('');
		$curl->setHeader('X-Requested-With', 'XMLHttpRequest');
		$curl->setCookie('key', 'value');
		$data = $curl->post('http://app.serverapi.com:89/',array(
				    'var1' => '1111111',
				    'var2' => '222222',
				));	
        $curl->close();

        //$resp = json_decode($data->response);
        var_dump($data->response);
        //var_dump($data);
        exit;
    }
);