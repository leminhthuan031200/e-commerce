<!DOCTYPE html>
<html lang="en">

@include('backend.layouts.head')

<body id="layoutSidenav_content" class="sb-nav-fixed">
  @include('backend.layouts.header')
  <!-- Page Wrapper -->
  {{-- <div id="wrapper">

    <!-- Sidebar -->
   
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column"> --}}

      <!-- Main Content -->
      <div id="layoutSidenav">
        <!-- Topbar -->
        @include('backend.layouts.sidebar')
        <!-- End of Topbar -->
        <div id="layoutSidenav_content">
          <main>
        <!-- Begin Page Content -->
        @yield('main-content')
        <!-- /.container-fluid -->
          </main>
          @include('backend.layouts.footer')
        </div>
      </div>
      <!-- End of Main Content -->
    

</body>

</html>
