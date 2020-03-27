<?php
require_once dirname(__FILE__) .'/bootstrap.php';
use Illuminate\Database\Capsule\Manager as Capsule;

class QueryMapper
{
    public function select()
    {
        //$result = Capsule::select('select * from users');
        $result = Capsule::table('address')->select('*')->get()->toArray();
        return $result;
    }
}
