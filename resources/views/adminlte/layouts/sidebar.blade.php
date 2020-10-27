<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="Wynch Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Wynch</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('home')}}" class="nav-link @if(Route::currentRouteName()=='home') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users')}}" class="nav-link @if(Route::currentRouteName()=='users') active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories')}}"
                       class="nav-link @if(Route::currentRouteName()=='categories') active @endif">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('brands')}}"
                       class="nav-link @if(Route::currentRouteName()=='brands') active @endif">
                        {{--                        <i class="nav-icon far fa-list-alt"></i>--}}
                        <i class="nav-icon fas fa-band-aid"></i>
                        <p>
                            Brands
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('vehicles')}}"
                       class="nav-link @if(Route::currentRouteName()=='vehicles') active @endif">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            {{trans('general.vehicles')}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
