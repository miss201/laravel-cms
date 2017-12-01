<?php
namespace App\Containers;

use App\Contracts\MenuContract;
use App\Menu;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/24
 * Time: 17:35
 */
class MenuContainer implements MenuContract
{
    public function addMenu($fid, $icon, $url, $name, $dscription, $is_menu, $srot)
    {
        $menuModel = new Menu();
        $menuModel->fid = $fid;
        $menuModel->icon = $icon;
        $menuModel->url = $url;
        $menuModel->name = $name;
        $menuModel->description = $dscription;
        $menuModel->is_menu = $is_menu;
        $menuModel->sort = $srot;
        return $menuModel->save();
    }
}