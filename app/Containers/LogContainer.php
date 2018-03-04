<?php
namespace App\Containers;

use App\Admin;
use App\Contracts\AdminContract;
use App\Contracts\LogContract;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\File;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/24
 * Time: 17:35
 */
class LogContainer implements LogContract
{
    public function getFiles($directory)
    {
        $logInfoList = [];
        $logList = File::allFiles($directory);
        foreach ($logList as $key => $val) {
            $logInfoList[$key] = array(
                'getFilename' => $val->getFilename(), //获取文件名
                'getLinkTarget' => $val->getPathname(), //获取文件链接目标文件
                'getMTime' => $val->getMTime(), //获取最后修改时间
                'getSize' => \App\Helpers\getHMFilesize($val->getSize()),//文件大小，单位字节
//                'getFileInfo'=>$val->getFileInfo()
            );
        }
        return $logInfoList;
    }

}