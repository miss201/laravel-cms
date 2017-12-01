<?php
namespace App\Containers;

use App\Admin;
use App\Contracts\AdminContract;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/24
 * Time: 17:35
 */
class AdminContainer implements AdminContract
{
    public function addAdmin($name, $email, $password)
    {
        $adminModel = new Admin();
        $adminModel->name = $name;
        $adminModel->email = $email;
        $adminModel->password = bcrypt($password);
        $adminModel->save();
        return $adminModel->where('email', $email)->select('id')->first();
    }
}