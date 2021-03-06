<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Zipcode;

return function (App $app) {
    $container = $app->getContainer();

    /** 郵便番号から住所情報を取得する. */
    $app->get("/zipcode[/{zipcode}]", function (Request $request, Response $response, array $args) use ($container) {
        $zipcode = empty($args) ? null : $args['zipcode'];
        $zipcode = Zipcode::find($zipcode);
        $addresses = $zipcode->address->prefecture . $zipcode->address->city . $zipcode->address->town;
        $container->get('logger')->info('addresses -> ' . print_r($addresses, true));
        return $response->withAddedHeader('Access-Control-Allow-Origin', '*')
            ->withJson($addresses, 200, JSON_UNESCAPED_UNICODE);
    });

    /** 郵便番号入力ページを促す文字列を返却. */
    $app->get("/", function (Request $request, Response $response, array $args) use ($container) {
        return "input url -> /zipcode/<postcode>.";
    });
};
