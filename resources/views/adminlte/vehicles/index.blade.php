<!DOCTYPE html>
<html>

<!-- Head -->
@include('adminlte.layouts.main')
<!-- /.head -->
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
@include('adminlte.layouts.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('adminlte.layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{trans('general.vehicles')}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('livewire.vehicle.home')
            </div>
            <!-- /.card-body -->
        </div>

    </div>

    <!-- /.content-wrapper -->
@include('adminlte.layouts.main_footer')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('adminlte.layouts.scripts')
</body>
</html>
