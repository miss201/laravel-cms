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
                    <h4 class="caption-title"><i class="fa fa-diamond text-success"></i> {{trans('messages.backend')}}</h4>
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

                        </ul>
                    </div>
                    <div class="brand">
                        <span class="logo"></span> {{trans('messages.backend')}}
                        <small>{{trans('messages.reg')}}</small>
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
                    <form action="{{ url('admin/register') }}" method="POST" class="margin-bottom-0">
                        {{ csrf_field() }}
                        <div class="form-group m-b-15">
                            <input type="text" name="name" class="form-control input-lg" placeholder="{{trans('messages.name')}}" value="{{ old('name') }}"/>
                        </div>
                        <div class="form-group m-b-15">
                            <input type="text" name="email" class="form-control input-lg" placeholder="{{trans('messages.email')}}" value="{{ old('email') }}"/>
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" name="password" class="form-control input-lg" placeholder="{{trans('messages.password')}}" />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="text" name="code" class="form-control input-inline" placeholder="{{trans('messages.code')}}"/>
                            <a onclick="javascript:re_captcha();" class=""><img src="{{url('admin/captcha/1')}}" id="c2c98f0de5a04167a9e427d883690ff5" class="img-thumbnail"  alt="{{trans('messages.code')}}" title="{{trans('messages.refreshImg')}}"></a>
                        </div>

                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">{{trans('messages.reg')}}</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40">
                            登录? 请点击 <a href="{{url('admin/login')}}" class="text-success">这里</a> 进行登录.
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
@section('auth-js')
    <script>
        function re_captcha() {
            $url = "{{ URL('admin/captcha') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('c2c98f0de5a04167a9e427d883690ff5').src=$url;
        }
    </script>
@endsection