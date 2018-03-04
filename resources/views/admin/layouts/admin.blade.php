<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-cn" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-cn">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>{{trans('messages.backend')}}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{ asset('asset_admin/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/css/theme/default.css') }}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('asset_admin/assets/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('asset_admin/assets/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
    @yield('admin-css')
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <a href="{{ url('admin') }}" class="navbar-brand"><span class="navbar-logo"></span> {{trans('messages.backend')}}</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form full-width">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{trans('messages.keywords')}}" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('asset_admin/assets/img/user-1.jpg') }}" alt="" />
                        <span class="hidden-xs">
                            @if('zh'== Session::get('lang') )
                                   {{trans('messages.lang-zh')}}
                                @else
                                  {{trans('messages.lang-en')}}
                            @endif
                        </span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li><a  siteUrl="{{url('admin/lang','en')}}" class="lang">{{trans('messages.lang-en')}}</a></li>
                        <li><a  siteUrl="{{url('admin/lang','zh')}}" class="lang">{{trans('messages.lang-zh')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('asset_admin/assets/img/user-3.jpg') }}" alt="" />
                        <span class="hidden-xs">{{ auth('admin')->user()->name }}</span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><a href="javascript:;">{{trans('messages.editProfile')}}</a></li>
                        <li><a href="{{url('admin/calendar')}}">{{trans('messages.calendar')}}</a></li>
                        <li><a href="{{url('admin/setting/index')}}">{{trans('messages.siteSetting')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('admin/logout') }}">{{trans('messages.logout')}}</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    @include('admin.layouts.sidebar')
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <!-- begin #content -->
    @yield('admin-content')
    <!-- end #content -->


    <!-- end theme-panel -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('asset_admin/assets/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
<script src="{{ asset('asset_admin/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
<script src="{{ asset('asset_admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="{{ asset('asset_admin/assets/crossbrowserjs/html5shiv.js') }}"></script>
<script src="{{ asset('asset_admin/assets/crossbrowserjs/respond.min.js') }}"></script>
<script src="{{ asset('asset_admin/assets/crossbrowserjs/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('asset_admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('asset_admin/assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('asset_admin/assets/js/apps.min.js') }}"></script>
@yield('admin-js')
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
    });
    $(function () {
        //删除
        $('.lang').on('click', function(){
            var url = $(this).attr('siteUrl')|| "";
            alert(url);
            //询问框
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
                        window.location.reload();
                    }else{
                    }
                }
            })
        });
    });
</script>
</body>
</html>
