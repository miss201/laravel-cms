@extends('admin.layouts.admin')

@section('admin-css')
    <link href="{{ asset('asset_admin/assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('asset_admin/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}"
          rel="stylesheet"/>
    <link href="{{ asset('asset_admin/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}"
          rel="stylesheet"/>
@endsection

@section('admin-content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Tables</a></li>
            <li class="active">Basic Tables</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">日志列表
            <small>Storage Logs.</small>
        </h1>
        <!-- end page-header -->
        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="table-basic-5">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                               data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                               data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                               data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">列表</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover" id="datatable">
                            <thead>
                            <tr>
                                <th>文件名称</th>
                                <th>文件大小</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logInfoList as $log)
                                <tr>
                                    <td>{{$log['getFilename']}}</td>
                                    <td>{{$log['getSize']}}</td>
                                    <td>{{date('Y-m-d H:i:s',$log['getMTime'])}}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a class="btn btn-primary"
                                               href="{{url('admin/log/download',base64_encode($log['getFilename']))}}">下载</a>
                                            <a class="btn btn-success"
                                               href="{{url('admin/log/read',base64_encode($log['getFilename']))}}">查看</a>
                                            <a class="btn btn-danger destroy" siteurl="{{url('admin/log/delete',base64_encode($log['getFilename']))}}">删除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-6 -->
        </div>
        <!-- end row -->
    </div>
@endsection

@section('admin-js')
    <script>
        $(function () {
            //删除
            $('.destroy').on('click', function(){
                var url = $(this).attr('siteurl')||'';
                //询问框
                layer.confirm('确认删除该信息？', {
                    btn: ['是', '否'] //按钮
                }, function () {
                    $.ajax({
                        url: url,
                        type: 'post',
                        cache: false,
                        data: {
                            '_token': "{{csrf_token()}}"
                        },
                        dataType: 'text',
                        success: function (data) {
                            if (data == "success") {
                                layer.msg('删除成功');
                                window.location.reload();
                            }else{
                                layer.msg('删除失败');
                            }
                            parent.layer.close(index);

                        }
                    })
                }, function () {

                });
            });
        });
    </script>
@endsection