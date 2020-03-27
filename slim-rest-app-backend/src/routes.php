<?php

use Model\Address;
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
        $container->get('logger')->info('addresses -> ' . print_r($addresses, true));
        return $response->withAddedHeader('Access-Control-Allow-Origin', '*')
            ->withJson($addresses, 200, JSON_UNESCAPED_UNICODE);
    });

    /** 郵便番号入力ページを促す文字列を返却. */
    $app->get("/", function (Request $request, Response $response, array $args) use ($container) {
        //クエリビルダー
        // $query = new QueryMapper();
        // $ret = $query->select();
        
        //Model
        $ret = Address::all();
        // $ret = Address::where('id',2230058)->get();
        // $ret = Address::where('town', '新羽町')->get();
        // $ret = Address::count();
        // return print_r($ret->toSql(), true);
        return print_r($ret, true);
        // return "input url -> /zipcode/<postcode>.";
    });
};
