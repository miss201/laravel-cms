<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 2017/4/10
 * Time: 9:51
 */

namespace App\Contracts;


interface LogContract
{
    public function getFiles($directory);
}