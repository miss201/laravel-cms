<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('admin');
    }

    public function index()
    {
        $envInfo = $_ENV;
        return view('admin/setting/index')->with('envinfo', $envInfo);
    }

    public function save()
    {
        $data = $this->request->input();
        array_shift($data);
        \App\Helpers\modifyEnv($data);
        return redirect('admin/setting/index')->with('success', trans('messages.editSuccess'));
    }

}
