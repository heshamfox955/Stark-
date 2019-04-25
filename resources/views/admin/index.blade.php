@include('admin.layouts.header')
@include('admin.layouts.navbar')
@include('admin.layouts.menu')
<!-- ============================================================== -->
<div class="dashboard-wrapper">

  <div class="content">
     @yield('content')
  </div>

</div>
@include('admin.layouts.footer')