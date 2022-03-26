<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
	protected $table = 'datas';
    protected $fillable = [
        'user_id', 'ip_address', 'mac_address', 'user_browser',
    ];
}
