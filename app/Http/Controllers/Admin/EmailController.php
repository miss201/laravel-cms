<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('admin');
        $this->request = $request;
    }

    //
    public function index()
    {
        return view('admin/email/index');
    }

    public function send()
    {
        $validator = $this->validateInfo($this->request->input());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $content = $this->request->input('content');
            Mail::raw($content, function ($message) {
                $to = $this->request->input('email');
                $theme = $this->request->input('theme');
                $message->to($to)->subject($theme);
            });
            $info = empty(Mail::failures()) ? '发送成功' : '发送失败';
            return Redirect::to('admin/email/index')->with('success', $info);

        }

    }

    protected function validateInfo(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'content' => 'required|min:10',
            'theme' => 'required|max:10'
        ]);
    }
}
