<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

require_once dirname(__FILE__) . '/Address.php';
require_once dirname(__FILE__) . '/Yomi.php';

class Zipcode extends Model
{
    protected $table = 'zipcode';
    protected $primaryKey = 'zipcode';

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }
    public function yomi()
    {
        return $this->belongsTo(Yomi::class, 'yomi_id', 'id');
    }
}
