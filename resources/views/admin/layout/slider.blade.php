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
            <li class="nav-header"></li>
            <li class="nav-item">
                <a href="{{route('articles.index')}}" class="nav-link {{\Request::route()->getName() == 'articles.index'?'active':''}}">
                    <i class="fas fa-newspaper"></i>
                    <p>
                        المقالات
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
