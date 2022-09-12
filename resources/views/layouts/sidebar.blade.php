<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('front/imgs/Icon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BloodBank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="mb-3">

        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                @can('التصنيفات')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('عرض التصنيفات')
                        <li class="nav-item">
                            <a href="{{route('categories.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All categories</p>
                            </a>
                        </li>
                        @endcan
                        @can('اضافة تصنيف')
                        <li class="nav-item">
                            <a href="{{route('categories.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new category</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                @endcan

                @can('المقالات')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('عرض المقالات')
                        <li class="nav-item">
                            <a href="{{route('posts.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All posts</p>
                            </a>
                        </li>
                        @endcan
                        @can('اضافة مقالة')
                        <li class="nav-item">
                            <a href="{{route('posts.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new post</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('المحافظات')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-globe"></i>
                        <p>
                            Governorates
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('عرض المحافظات')
                        <li class="nav-item">
                            <a href="{{route('governorates.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All governorates</p>
                            </a>
                        </li>
                        @endcan

                        @can('اضافة محافظة')
                        <li class="nav-item">
                            <a href="{{route('governorates.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new governorate</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('المدن')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-globe"></i>
                        <p>
                            Cities
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('عرض المدن')
                        <li class="nav-item">
                            <a href="{{route('cities.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Cities</p>
                            </a>
                        </li>
                        @endcan
                        @can('اضافة مدينة')
                        <li class="nav-item">
                            <a href="{{route('cities.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new City</p>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan

                @can('المستخدمين')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('عرض المستخدمين')
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        @endcan
                        @can('اضافة مستخدم')
                        <li class="nav-item">
                            <a href="{{route('users.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new User</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('الصلاحيات')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Permissions
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('عرض الصلاحيات')
                            <a href="{{route('roles.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('اضافة صلاحية')
                            <a href="{{route('roles.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new permission</p>
                            </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                @endcan

                @can('عرض العملاء')
                <li class="nav-item">
                    <a href="{{route('clients.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Clients</p>
                    </a>
                </li>
                @endcan

                @can('عرض الطلبات')
                <li class="nav-item">
                    <a href="{{route('donations.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-spinner" aria-hidden="true"></i>

                        <p>
                            Donations
                        </p>
                    </a>
                </li>
                @endcan

                @can('عرض الرسائل')
                <li class="nav-item">
                    <a href="{{route('contacts.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>
                @endcan

                @can('عرض الإعدادات')
                <li class="nav-item">
                    <a href="{{route('settingsEdit')}}" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                @endcan

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
