<?php
namespace App\Containers;

use App\Contracts\RoleContract;
use App\Role;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/24
 * Time: 17:35
 */
class RoleContainer implements RoleContract
{
    /**
     * @param $name
     * @param $description
     * @return bool
     */
    public function addRole($name, $description)
    {
        $roleModel = new Role();
        $roleModel->name = $name;
        $roleModel->description = $description;
        return $roleModel->save();
    }

    /**
     * @param $pagesize
     * @return mixed
     */
    public function getRoleList($pagesize)
    {

        return DB::table('roles')->paginate($pagesize);
    }

    /**
     * @param $id
     */
    public function getRoleById($id)
    {
        $role = new Role();
        return $role->find($id);
    }

    /**
     * @param $id
     * @param $name
     * @param $description
     * @return mixed
     */
    public function updateRole($id, $name, $description)
    {
        $role = Role::find($id);
        $role->name = $name;
        $role->description = $description;
        return $role->save();
    }
}