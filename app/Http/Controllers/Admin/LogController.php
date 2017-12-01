<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\LogContract;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function __construct(LogContract $logContainer)
    {
        $this->middleware('admin');
        $this->logContainer = $logContainer;
        $this->logPath = storage_path('logs');
    }

    /**
     * 日志列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directory = $this->logPath;
        $logInfoList = $this->logContainer->getFiles($directory);
        return view('admin/log/index')->with('logInfoList', $logInfoList);
    }

    /**
     * 下载日志
     * @param $fileName
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($fileName)
    {
        $fileName = base64_decode($fileName);
        $path = $this->logPath . '/' . $fileName;
        return response()->download($path);
    }


    /**
     * 读取日志
     * @param $fileName
     * @return mixed
     */
    public function read($fileName)
    {
        $fileName = base64_decode($fileName);
        $path = $this->logPath . '/' . $fileName;
        return File::get($path);
    }

    /**
     *  删除文件
     * @param $fileName
     */
    public function delete($fileName)
    {
        $info = 'fail';
        $fileName = base64_decode($fileName);
        $path = $this->logPath . '/' . $fileName;
        $flag = File::delete($path);
        if ($flag) {
            $info = 'success';
        }
        return $info;
    }


}
