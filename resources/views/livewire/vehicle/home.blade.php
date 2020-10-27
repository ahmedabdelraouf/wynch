<!DOCTYPE html>
<html>
<head>
    <title></title>
    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    @livewireStyles
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @livewire('vehicles')
        </div>
    </div>
</div>
@livewireScripts
<script type="text/javascript">
    window.livewire.on('VehicleStore', () => {
        $('#VehicleModal').modal('hide');
    });
</script>
</body>
</html>
