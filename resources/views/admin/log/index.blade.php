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
        <!-- begin page-header -->
        <h1 class="page-header">{{trans('menu.systemSettings')}}
            <small>{{trans('menu.logList')}}</small>
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
                        <h4 class="panel-title">{{trans('menu.list')}}</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover" id="datatable">
                            <thead>
                            <tr>
                                <th>{{trans('menu.fileName')}}</th>
                                <th>{{trans('menu.size')}}</th>
                                <th>{{trans('menu.updateTime')}}</th>
                                <th>{{trans('menu.operation')}}</th>
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
                                               href="{{url('admin/log/download',base64_encode($log['getFilename']))}}">{{trans('menu.download')}}</a>
                                            <a class="btn btn-success"
                                               href="{{url('admin/log/read',base64_encode($log['getFilename']))}}">{{trans('menu.view')}}</a>
                                            <a class="btn btn-danger destroy" siteurl="{{url('admin/log/delete',base64_encode($log['getFilename']))}}">{{trans('menu.delete')}}</a>
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
                layer.confirm("{{trans('menu.confirmToDelete')}}", {
                    btn: ["{{trans('menu.yes')}}", "{{trans('menu.no')}}"] //按钮
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
                                layer.msg("{{trans('menu.deleteSuccess')}}");
                                window.location.reload();
                            }else{
                                layer.msg("{{trans('menu.deleteFail')}}");
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