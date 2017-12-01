<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 2017/4/10
 * Time: 9:51
 */

namespace App\Contracts;


interface AdminContract
{
    /**
     * 添加一个后台管理用户
     * @param $name
     * @param $email
     * @param $password
     * @return  $adminId
     */
    public function addAdmin($name, $email, $password);
}