<div id="sidebar" class="sidebar sidebar-transparent">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="{{ asset('asset_admin/assets/img/user-13.jpg') }}" alt=""/></a>
                </div>
                <div class="info">
                    {{ auth('admin')->user()->user_type }}
                    <small>{{auth('admin')->user()->name.'/'.auth('admin')->user()->email }}</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">


            <li class="has-sub ">
                <a href="{{url('admin/index')}}"><b class="glyphicon glyphicon-dashboard"></b><span> {{trans('menu.dashboard')}}</span></a>
            </li>

            @can('isAdmin')
            <li class="has-sub active">
                <a href="javascript:;"><b class="glyphicon glyphicon-th-large"></b><span> {{trans('menu.systemSettings')}}</span></a>
                <ul class="sub-menu">
                    {{--<li class="has-sub "><a href="{{url('admin/admin')}}"><b class="caret pull-right"></b>{{trans('menu.userMgmt')}}</a></li>--}}
                    {{--<li><a href="{{url('admin/menu')}}"><b class="caret pull-right"></b>菜单管理</a></li>--}}
                    {{--<li><a href="{{url('admin/role')}}"><b class="caret pull-right"></b>角色管理</a></li>--}}
                    <li class="has-sub active"><a href="{{url('admin/log')}}"><b class="caret pull-right"></b>{{trans('menu.logMgmt')}}</a></li>
                    <li><a href="{{url('admin/email/index')}}"><b class="caret pull-right"></b>{{trans('menu.sendEmail')}}</a></li>
                    <li><a href="{{url('admin/seg')}}"><b class="caret pull-right"></b>{{trans('menu.segTools')}}</a></li>
                </ul>
            </li>
            @endcan





            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                            class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>

        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<script>
    var activeNode = $('.active');
    activeNode.parents('li').addClass('active');
</script>