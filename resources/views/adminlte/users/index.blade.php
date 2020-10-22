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
                <h3 class="card-title">Users information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>name</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>created_at</th>
{{--                        <th>action</th>--}}
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($users))
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
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
