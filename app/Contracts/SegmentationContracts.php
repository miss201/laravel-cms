<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24
 * Time: 18:09
 */

namespace App\Contracts;


interface SegmentationContracts
{
    /**
     * 分詞
     * @param $info
     * @return mixed
     */
   public function seg($info);
}