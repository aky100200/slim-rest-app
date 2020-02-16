<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    /** 郵便番号から住所情報を取得する. */
    $app->get("/zipcode[/{zipcode}]", function (Request $request, Response $response, array $args) use ($container) {
        $zipcode = empty($args) ? null : $args['zipcode'];
        $mapper = new ZipcodeMapper($this->db);
        $addresses = $mapper->getAddress($zipcode);
        $newResponse = $response->withAddedHeader('Access-Control-Allow-Origin', '*');
        $container->get('logger')->info('addresses -> ' . print_r($addresses, true));
        $newResponse = $newResponse->withJson($addresses, 200, JSON_UNESCAPED_UNICODE);
        return $newResponse;
    });
};
