@extends('admin.layouts.admin')

@section('admin-css')
    <link href="{{ asset('asset_admin/assets/plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
@endsection

@section('admin-content')
    <div id="content" class="content">

        <!-- begin page-header -->
        <h1 class="page-header">{{trans('menu.systemSettings')}}<small> {{trans('menu.sendEmail')}}</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">{{trans('menu.sendEmail')}}</h4>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   @if(count(Session::get('success'))>0)
                        <div class="alert alert-success">
                            <ul>
                                    <li>{{ Session::get('success') }}</li>
                            </ul>
                        </div>
                   @endif
                    <div class="panel-body panel-form">
                        <form class="form-horizontal form-bordered" data-parsley-validate="true" action="{{url('admin/email/send')}}" method="POST">
                            {{ csrf_field() }}
                            {{--{{ method_field('PATCH') }}--}}
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2" for="email">{{trans('menu.receiveremail')}} * :</label>
                                <div class="col-md-4 col-sm-4">
                                    <input class="form-control" type="text" name="email" placeholder="{{trans('menu.receiveremail')}}" data-parsley-required="true"  data-parsley-required-message="{{trans('messages.enterRecevierEmail')}}" value="{{ old('email') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2" for="theme">{{trans('menu.theme')}} * :</label>
                                <div class="col-md-4 col-sm-4">
                                    <input class="form-control" type="text" name="theme" placeholder="{{trans('menu.theme')}}" data-parsley-required="true"  data-parsley-required-message="{{trans('messages.enterTheme')}}" value="{{ old('theme') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2" for="content">{{trans('menu.emailcontent')}} * :</label>
                                <div class="col-md-4 col-sm-4">
                                    <textarea name="content" class="form-control" rows="3" placeholder="{{trans('menu.emailcontent')}} " data-parsley-required="true"  data-parsley-required-message="{{trans('messages.enterContent')}}" >{{ old('content') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2"></label>
                                <div class="col-md-4 col-sm-4">
                                    <button type="submit" class="btn btn-primary">{{trans('menu.send')}}</button>
                                </div>
                            </div>
                        </form>
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
    <script src="{{ asset('asset_admin/assets/plugins/parsley/dist/parsley.js') }}"></script>
    <script src="{{ asset('asset_admin/assets/plugins/switchery/switchery.min.js') }}"></script>
    <script>

    </script>
@endsection