<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 2017/4/10
 * Time: 9:51
 */

namespace App\Contracts;


interface MenuContract
{
    /**
     * @param $name
     * @param $description
     * @return mixed
     */
    public function addMenu($fid,$icon,$url,$name,$dscription,$is_menu,$srot);


}