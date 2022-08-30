<div id="layoutSidenav_nav" class="sticky-sidebar">
  <nav class="sb-sidenav accordion sb-sidenav-dark sidenav" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
          <div class="nav">
              <div class="sb-sidenav-menu-heading">Cửa hàng</div>
              <a class="nav-link" href="{{route('admin')}}">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span> Dashboard</span></a>
              {{-- <hr class="sidebar-divider"> --}}
              <!-- Heading -->
              <div class="sb-sidenav-menu-heading"> Banner</div>
              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item">
                  <a class="nav-link" href="{{route('file-manager')}}">
                      <i class="fas fa-fw fa-chart-area"> </i> &nbsp
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
              <div class="sb-sidenav-menu-heading">Cửa hàng</div>
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
                      <i class="fas fa-hammer fa-chart-area"></i>&nbsp
                      <span> Đặt hàng</span>
                  </a>
              </li>
          
              <!-- Reviews -->
              <li class="nav-item">
                  <a class="nav-link"  href="{{route('review.index')}}">
                      <i class="fas fa-comments"></i>&nbsp
                      <span> Đánh giá</span></a>
              </li>
           <!-- Posts -->    
              <div class="sb-sidenav-menu-heading">Bài viết</div>
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
                      <i class="fas fa-comments fa-chart-area"></i>&nbsp
                      <span> Bình luận</span>
                  </a>
              </li>
              <div class="sb-sidenav-menu-heading">Cài đặt trang web</div>
              <li class="nav-item">
                  <a class="nav-link"  href="{{route('coupon.index')}}">
                      <i class="fas fa-table"></i>&nbsp
                      <span> Voucher</span></a>
                </li>
                 <!-- Users -->
                 <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <i class="fas fa-users"></i>&nbsp
                        <span> Tài khoản</span></a>
                </li>
              <!-- General settings -->
                 <li class="nav-item">
                    <a class="nav-link" href="{{route('settings')}}">
                        <i class="fas fa-cog"></i>&nbsp
                        <span> Cài đặt</span></a>
                </li> 
          </div>
      </div>
  </nav>
</div>