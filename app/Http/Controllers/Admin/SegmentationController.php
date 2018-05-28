<?php
/**
 * 中文分词
 */
namespace App\Http\Controllers\Admin;

use App\Contracts\SegmentationContracts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SegmentationController extends Controller
{
    /**
     * 依赖注入Request和 Seg分词服务
     * SegmentationController constructor.
     * @param Request $request
     * @param SegmentationContracts $segmentation
     */
    public function __construct(Request $request,SegmentationContracts $segmentation)
    {
        $this->middleware('admin');
        $this->request = $request;
        $this->segmentation =$segmentation;
    }

    /**
     * 分词首页
     *
     * @return $this
     */
    public function index(){
        $result = null;
        if(strtolower($this->request->method()) == "post"){
            $validator = $this->validateInfo($this->request->input());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $content = $this->request->input("content");
                $result = $this->segmentation->seg($content);
            }
        }
        return view('admin/seg/index')->with("result",$result);
    }

    /**
     * 验证输入的内容
     * @param array $data
     * @return mixed
     */
    protected function validateInfo(array $data)
    {
        return Validator::make($data, [
            'content' => 'required|min:10',
        ]);
    }
}
