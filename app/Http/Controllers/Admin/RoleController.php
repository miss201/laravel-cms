<?php
namespace App\Http\Controllers\Admin;

use App\Contracts\RoleContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct(Request $request, RoleContract $roleContainer)
    {
        $this->request = $request;
        $this->roleContainer = $roleContainer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagesize = 10;
        $roleList = $this->roleContainer->getRoleList($pagesize);
        return view('admin/role/index')->with('roleList', $roleList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/role/create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request PermissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $validator = $this->validateInfo($this->request->input());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $name = $this->request->input('name');
            $description = $this->request->input('description') ? $this->request->input('description') : null;
            $flag = $this->roleContainer->addRole($name, $description);
            if ($flag) {
                return Redirect::to('admin/role')->with('success', '添加成功');
            } else {
                return Redirect::to('admin/role')->with('success', '添加失败');
            }
        }
    }

    protected function validateInfo(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roleInfo = $this->roleContainer->getRoleById($id);
        return view('admin/role/edit')->with('roleInfo', $roleInfo);
    }

    /**
     * Update the specified resource in storage.
     * @param RoleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id)
    {
        $validator = $this->validateUpdateInfo($this->request->input());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $name = $this->request->input('name');
            $description = $this->request->input('description') ? $this->request->input('description') : null;
            $flag = $this->roleContainer->updateRole($id, $name, $description);
            if ($flag) {
                return Redirect::to('admin/role')->with('success', '添加成功');
            } else {
                return Redirect::to('admin/role')->with('success', '添加失败');
            }
        }
    }

    protected function validateUpdateInfo(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'description' => 'required'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function ajaxIndex(Request $request)
    {

    }
}
