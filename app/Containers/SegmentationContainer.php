<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24
 * Time: 18:11
 */

namespace App\Containers;


use App\Contracts\SegmentationContracts;
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;

class SegmentationContainer implements SegmentationContracts
{
    public function __construct()
    {
        Jieba::init();
        Finalseg::init();
    }

    public function seg($info)
    {
        return Jieba::cut($info);
    }
}