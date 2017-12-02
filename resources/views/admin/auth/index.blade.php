@extends('admin.layouts.auth')

@section('admin-auth-page-container')
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="{{ asset('asset_admin/assets/img/login-bg/timg.jpg') }}" data-id="login-cover-image" alt="" />
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><i class="fa fa-diamond text-success"></i> Backend </h4>
                    <p>
                       XXXX
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">

                <!-- begin login-header -->
                <div class="login-header">
                    <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown navbar-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('asset_admin/assets/img/user-1.jpg') }}" alt="" />
                                <span class="hidden-xs">语言切换</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft">
                                <li class="arrow"></li>
                                <li><a href="">中文</a></li>
                                <li><a href="#">英文</a></li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                    <div class="brand">
                        <span class="logo"></span> Backend
                        <small>Login</small>
                    </div>

                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert" style="text-align: center;">{{  session('error') }}</div>
                        @endif

                    <form action="{{ url('admin/login') }}" method="POST" class="margin-bottom-0">
                        {{ csrf_field() }}
                        <div class="form-group m-b-15">
                            <input type="text" name="email" class="form-control input-lg" placeholder="邮箱" value="{{ old('email') }}"/>
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" name="password" class="form-control input-lg" placeholder="密码" />
                        </div>
                        <div class="checkbox m-b-30">
                            <label>
                                <input name="remember" type="checkbox" /> 记住密码
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">登　录</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40">
                           没有账号? 点击 <a href="{{url('admin/register')}}" class="text-success">这里</a> 进行注册.
                        </div>
                        <hr />
                        <p class="text-center text-inverse">
                            &copy; XXXXXXXX
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->

        <!-- end theme-panel -->
    </div>
@endsection