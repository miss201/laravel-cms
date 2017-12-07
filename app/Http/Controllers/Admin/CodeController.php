<?php

namespace App\Http\Controllers\Admin;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CodeController extends Controller
{
    /**
     * 生成验证码
     * @param $tmp
     * @return mixed
     */
    public function captcha($tmp)
    {
        $builder = new CaptchaBuilder();
        $builder->build(150, 32);
        $phrase = $builder->getPhrase();

        Session::flash('captchaCode', $phrase);
        ob_clean();
        return response($builder->output())->header('Content-type', 'image/jpeg');
    }
}
