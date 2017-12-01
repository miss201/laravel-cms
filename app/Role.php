<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    //指定允许批量赋值的字段
    protected $fillable = [
        'name', 'description',
    ];


    /*public function permissionRole()
    {
        return $this->hasOne('App\permissionRole','roleid','roleid');
    }*/
}
