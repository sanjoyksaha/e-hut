<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
{{--                User Management Start--}}
                @can('user-management-access')
                    <li class="sidebar-item {{ Request::is('admin/admin_users*') ? 'active' : '' }}{{ Request::is('admin/role*') ? 'active' : '' }}{{ Request::is('admin/permission*') ? 'active' : '' }} {{ Request::is('admin/admin_users*') ? 'selected' : '' }}{{ Request::is('admin/role*') ? 'selected' : '' }}{{ Request::is('admin/permission*') ? 'selected' : '' }}">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-account-settings-variant"></i>
                            <span class="hide-menu">User Management </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level {{ Request::is('admin/admin_users*') ? 'in' : '' }}{{ Request::is('admin/role*') ? 'in' : '' }}{{ Request::is('admin/permission*') ? 'in' : '' }}">
                            @can('user-access')
                                <li class="sidebar-item {{ Request::is('admin/admin_users*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.admin_users.index') }}" class="sidebar-link">
                                        <span class="hide-menu"> User </span>
                                    </a>
                                </li>
                            @endcan
                            @can('role-access')
                                <li class="sidebar-item {{ Request::is('admin/role*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.role.index') }}" class="sidebar-link">
                                        <span class="hide-menu"> Role </span>
                                    </a>
                                </li>
                            @endcan
                            @can('permission-access')
                                <li class="sidebar-item {{ Request::is('admin/permission*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.permission.index') }}" class="sidebar-link">
                                        <span class="hide-menu"> Permission </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
{{--                User Management End--}}
{{--                Category Management Start--}}
                @can('category-management-access')
                    <li class="sidebar-item {{ Request::is('admin/category*') ? 'active' : '' }}{{ Request::is('admin/sub-category*') ? 'active' : '' }}{{ Request::is('admin/child-sub-category*') ? 'active' : '' }} {{ Request::is('admin/category*') ? 'selected' : '' }}{{ Request::is('admin/sub-category*') ? 'selected' : '' }}{{ Request::is('admin/child-sub-category*') ? 'selected' : '' }}">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-tag-multiple"></i>
                            <span class="hide-menu">Category Management </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level {{ Request::is('admin/category*') ? 'in' : '' }}{{ Request::is('admin/sub-category*') ? 'in' : '' }}{{ Request::is('admin/child-sub-category*') ? 'in' : '' }}">
                            @can('category-access')
                                <li class="sidebar-item {{ Request::is('admin/category*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.category.index') }}" class="sidebar-link">
                                        <span class="hide-menu"> Category </span>
                                    </a>
                                </li>
                            @endcan
                            @can('subcategory-access')
                                <li class="sidebar-item {{ Request::is('admin/sub-category*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.sub-category.index') }}" class="sidebar-link">
                                        <span class="hide-menu"> Sub Category </span>
                                    </a>
                                </li>
                            @endcan
                            @can('childsubcategory-access')
                                <li class="sidebar-item {{ Request::is('admin/child-sub-category*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.child-sub-category.index') }}" class="sidebar-link">
                                        <span class="hide-menu"> Child Sub-Category </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
{{--                Category Management End--}}
{{--                Brand Start--}}
                @can('brand-access')
                    <li class="sidebar-item {{ Request::is('admin/brand*') ? 'active' : '' }} {{ Request::is('admin/brand*') ? 'selected' : '' }}">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.brand.index') }}" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="hide-menu">Brand</span>
                        </a>
                    </li>
                @endcan
{{--                Brand End--}}
{{--                Supplier Start--}}
                @can('supplier-access')
                    <li class="sidebar-item {{ Request::is('admin/supplier*') ? 'active' : '' }} {{ Request::is('admin/supplier*') ? 'selected' : '' }}">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.supplier.index') }}" aria-expanded="false">
                            <i class="mdi mdi-truck-delivery"></i>
                            <span class="hide-menu">Supplier</span>
                        </a>
                    </li>
                @endcan
{{--                Supplier End--}}
{{--                Settings Management Start--}}
                <li class="sidebar-item {{ Request::is('admin/size*') ? 'active' : '' }}{{ Request::is('admin/color*') ? 'active' : '' }}{{ Request::is('admin/unit*') ? 'active' : '' }}{{ Request::is('admin/currency*') ? 'active' : '' }}{{ Request::is('admin/coupon*') ? 'active' : '' }} {{ Request::is('admin/size*') ? 'selected' : '' }}{{ Request::is('admin/color*') ? 'selected' : '' }}{{ Request::is('admin/unit*') ? 'selected' : '' }}{{ Request::is('admin/currency*') ? 'selected' : '' }}{{ Request::is('admin/coupon*') ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu">Settings </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level {{ Request::is('admin/size*') ? 'in' : '' }}{{ Request::is('admin/color*') ? 'in' : '' }}{{ Request::is('admin/unit*') ? 'in' : '' }}{{ Request::is('admin/currency*') ? 'in' : '' }}{{ Request::is('admin/coupon*') ? 'in' : '' }}">
                        @can('size-access')
                            <li class="sidebar-item {{ Request::is('admin/size*') ? 'active' : '' }}">
                                <a href="{{ route('admin.size.index') }}" class="sidebar-link">
                                    <span class="hide-menu">Size</span>
                                </a>
                            </li>
                        @endcan
                        @can('color-access')
                            <li class="sidebar-item {{ Request::is('admin/color*') ? 'active' : '' }}">
                                <a href="{{ route('admin.color.index') }}" class="sidebar-link">
                                    <span class="hide-menu">Color</span>
                                </a>
                            </li>
                        @endcan
                        @can('unit-access')
                            <li class="sidebar-item {{ Request::is('admin/unit*') ? 'active' : '' }}">
                                <a href="{{ route('admin.unit.index') }}" class="sidebar-link">
                                    <span class="hide-menu">Unit</span>
                                </a>
                            </li>
                        @endcan
                        @can('unit-access')
                            <li class="sidebar-item {{ Request::is('admin/currency*') ? 'active' : '' }}">
                                <a href="{{ route('admin.currency.index') }}" class="sidebar-link">
                                    <span class="hide-menu">Currency</span>
                                </a>
                            </li>
                        @endcan
                        @can('coupon-access')
                            <li class="sidebar-item {{ Request::is('admin/coupon*') ? 'active' : '' }}">
                                <a href="{{ route('admin.coupon.index') }}" class="sidebar-link">
                                    <span class="hide-menu">Coupon</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
{{--                Settings Management End--}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
