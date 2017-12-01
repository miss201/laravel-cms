<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 2017/4/10
 * Time: 9:51
 */

namespace App\Contracts;


interface RoleContract
{
    /**
     * @param $name
     * @param $description
     * @return mixed
     */
    public function addRole($name,$description);

    public function getRoleList($pagesize);

    public function getRoleById($id);

    public function updateRole($id,$name,$description);
}