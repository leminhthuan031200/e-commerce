<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('backend/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
                    <!-- Navbar Search-->
            <!-- Navbar-->
            {{-- <ul class="navbar-nav ms-md-12 me-1 me-lg-12">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth()->user()->name}}</span>
                        @if(Auth()->user()->photo)
                          <img class="img-profile rounded-circle"width="5%" src="{{Auth()->user()->photo}}">
                        @else
                          <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
                        @endif</a>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul> --}}
            <ul class="navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown no-caret d-none d-md-block me-3">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="fw-500">{{Auth()->user()->name}}</div>
                    </a>
                </li>
                <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                        <!-- Example Alert 1-->
                        @include('backend.notification.show')
                </li>
                <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications" id="messages" data-url="{{route('messages.five')}}">
                    @include('backend.message.message')
                  </li>
            <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-12">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth()->user()->photo)
                      <img class="img-fluid" src="{{Auth()->user()->photo}}">
                    @else
                      <img class="img-fluid" src="{{asset('backend/img/avatar.png')}}">
                    @endif</a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        @if(Auth()->user()->photo)
                        <img class="dropdown-user-img" src="{{Auth()->user()->photo}}">
                      @else
                        <img class="dropdown-user-img" src="{{asset('backend/img/avatar.png')}}">
                      @endif</a>
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">{{Auth()->user()->name}}</div>
                            <div class="dropdown-user-details-email">{{Auth()->user()->email}}</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('admin-profile')}}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Thông tin
                    </a>
                    <a class="dropdown-item" href="href="{{route('settings')}}"">
                        <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                        Thay đổi mật khẩu
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Đăng xuất') }}
                    </a>
                </div>
                
            </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark sidenav" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('admin')}}">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span> Dashboard</span></a>
                            {{-- <hr class="sidebar-divider"> --}}
                            <!-- Heading -->
                            <div class="sb-sidenav-menu-heading"> Banner</div>
                            <!-- Nav Item - Pages Collapse Menu -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('file-manager')}}">
                                    <i class="fas fa-fw fa-chart-area"></i>
                                    <span>Đa phương tiện</span></a>
                            </li>    
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBanners" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Banners
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseBanners" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('banner.index')}}">Banners</a>
                                    <a class="nav-link" href="{{route('banner.create')}}">Thêm Banners</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Shop</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCate" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Danh mục
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCate" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('category.index')}}">Danh mục</a>
                                    <a class="nav-link" href="{{route('category.create')}}">Thêm danh mục</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link"  href="{{route('product.index')}}">Sản phẩm</a>
                                    <a class="nav-link" href="{{route('product.create')}}">Thêm sản phẩm</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Thương hiệu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseBrand" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('brand.index')}}">Thương hiệu</a>
                                    <a class="nav-link"  href="{{route('brand.create')}}">Thêm thương hiệu</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseShip" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Giao hàng
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseShip" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('shipping.index')}}">Giao hàng</a>
                                    <a class="nav-link" href="{{route('shipping.create')}}">Thêm giao hàng</a>
                                </nav>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('order.index')}}">
                                    <i class="fas fa-hammer fa-chart-area"></i>
                                    <span> Đặt hàng</span>
                                </a>
                            </li>
                        
                            <!-- Reviews -->
                            <li class="nav-item">
                                <a class="nav-link"  href="{{route('review.index')}}">
                                    <i class="fas fa-comments"></i>
                                    <span> Đánh giá</span></a>
                            </li>
                         <!-- Posts -->    
                            <div class="sb-sidenav-menu-heading">Posts</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Bài viết
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('post.index')}}"> Bài viết</a>
                                    <a class="nav-link" href="{{route('post.create')}}">Thêm Bài viết</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePostCate" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Danh mục bài viết
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePostCate" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link"  href="{{route('post-category.index')}}"> Danh mục bài viết</a>
                                    <a class="nav-link"  href="{{route('post-category.create')}}">Thêm Danh mục bài viết</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTags" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tags
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseTags" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('post-tag.index')}}">Tags</a>
                                    <a class="nav-link" href="{{route('post-tag.create')}}">Thêm Banners</a>
                                </nav>
                            </div>
                    <!-- Comments -->
                            <li class="nav-item">
                                <a class="nav-link"href="{{route('comment.index')}}">
                                    <i class="fas fa-comments fa-chart-area"></i>
                                    <span> Bình luận</span>
                                </a>
                            </li>
                            <div class="sb-sidenav-menu-heading">Cài đặt trang web</div>
                            <li class="nav-item">
                                <a class="nav-link"  href="{{route('coupon.index')}}">
                                    <i class="fas fa-table"></i>
                                    <span> Voucher</span></a>
                              </li>
                               <!-- Users -->
                               <li class="nav-item">
                                  <a class="nav-link" href="{{route('users.index')}}">
                                      <i class="fas fa-users"></i>
                                      <span> Tài khoản</span></a>
                              </li>
                            <!-- General settings -->
                               <li class="nav-item">
                                  <a class="nav-link" href="{{route('settings')}}">
                                      <i class="fas fa-cog"></i>
                                      <span> Cài đặt</span></a>
                              </li> 
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('backend/js/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
