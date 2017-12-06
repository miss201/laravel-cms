<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AdminContract;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function __construct(Request $request, AdminContract $adminContainer)
    {
        $this->request = $request;
        $this->adminContainer = $adminContainer;
    }

    /**
     *  登录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if ($this->request->isMethod('post')) {
            $validator = $this->validateInfo($this->request->input());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                if (Auth::guard('admin')->attempt(['email' => $this->request->email, 'password' => $this->request->password])) {
                    return Redirect::to('/admin/index')->with('success', trans('messages.loginSucess'));
                } else {
                    return back()->with('error', trans('messages.loginError'))->withInput();
                }
            }
        } else {
            return view('admin.auth.index');
        }
    }

    /***
     * 验证
     * @param array $data
     * @return mixed
     */
    protected function validateInfo(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:12|alpha_dash'
        ]);
    }

    /**
     *  注册
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        if ($this->request->isMethod('post')) {
            $admin = $this->adminContainer->addAdmin($this->request->input('name'), $this->request->input('email'), $this->request->input('password'));
            return Redirect::to('admin/login')->with('success', trans('messages.registerSuccess'));
        } else {
            return view('admin.auth.register');
        }
    }


    /**
     * 登出
     */
    public function logout()
    {
        if (Auth::guard('admin')->user()) {
            Auth::guard('admin')->logout();
        }
        return view('admin.auth.index');
    }
}
