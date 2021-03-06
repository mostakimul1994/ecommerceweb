                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="text-center">
                            <img src="{{ asset ('assets/admin/images/users/avatar-1.jpg')}}" alt="" class="img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ auth()->user()-> name }}</a>

                            </div>

                            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route ('admin.dashboard')}}" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i> <span>Users/Admin </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route ('user.index')}}">Users Lists</a></li>
                                    <li><a href="{{ route ('user.create')}}">Create New User</a></li>
                                    <!-- create route  -->
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span>Products</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route ('product.index')}}">Products Lists</a></li>
                                    <li><a href="{{ route ('product.create')}}">Create New Products</a></li>
                                    <!-- create route  -->
                                </ul>

                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span>Category</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="#">Category Lists</a></li>
                                        <li><a href="#">Create New Category</a></li>
                                        <!-- create route  -->
                                    </ul>
                                </li>

                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-agenda"></i> <span>Vendor</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="#">Vendor Lists</a></li>
                                        <li><a href="#">Create New Vendor</a></li>
                                        <!-- create route  -->
                                    </ul>
                                </li>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>