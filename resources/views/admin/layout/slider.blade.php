<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info d-flex">
            <a href="#" class="d-block mx-2">{{admin()->user()->name}}</a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-danger text-sm float-left ">تسجيل خروج</button>
            </form>
        </div>

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{aroute('home')}}" class="nav-link {{\Request::route()->getName() == 'admin.home'?'active':''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        الرئيسية
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('supervisors.index')}}" class="nav-link {{\Request::route()->getName() == 'supervisors.index'?'active':''}}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        المشرفين
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('articles.index')}}" class="nav-link {{\Request::route()->getName() == 'articles.index'?'active':''}}">
                    <i class="fas fa-newspaper"></i>
                    <p>
                        المقالات
                    </p>
                </a>
            </li>
            <li class="nav-header">المستخدمين</li>
            <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{\Request::route()->getName() == 'users.index'?'active':''}}">
                    <i class="fas fa-users"></i>
                    <p>جدول المستخدمين</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('blockedUsers')}}" class="nav-link {{\Request::route()->getName() == 'blockedUsers'?'active':''}}">
                    <i class="fas fa-lock"></i>
                    <p>المستخدمين المحظورين</p>
                </a>
            </li>
            <li class="nav-header">الطلبات</li>
            <li class="nav-item">
                <a href="{{route('orders.index')}}" class="nav-link d-flex align-items-start {{\Request::route()->getName() == 'orders.index' ?'active':''}}">
                   <?php $count= \App\Order::where('status_id',1)->count();?>
                       @if($count)
                           <span class="badge badge-warning">
                               <i class="fas fa-users"></i>
                            {{$count}}
                        </span>
                       @else
                           <i class="fas fa-users"></i>
                       @endif
                    <p class="mx-1"> طلبات قيد الانتظار </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('orders.acceptedOrder')}}" class="nav-link {{\Request::route()->getName() == 'orders.acceptedOrder'?'active':''}}">
                    <i class="fas fa-fast-forward"></i>
                    <p>طلبات قيد الحل</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('orders.refusedOrder')}}" class="nav-link {{\Request::route()->getName() == 'orders.refusedOrder'?'active':''}}">
                    <i class="fas fa-times-circle"></i>
                    <p>الطلبات المرفوضة</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('orders.solvedOrder')}}" class="nav-link {{\Request::route()->getName() == 'orders.solvedOrder'?'active':''}}">
                    <i class="fas fa-check-circle"></i>
                    <p>الطلبات المحلة/المنتهية</p>
                </a>
            </li>
            <li class="nav-header"></li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
