<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>H2T Shop || DASHBOARD</title>
  
    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/metropolis" rel="stylesheet">
                
    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
            {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}
    <link href="{{asset('backend/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/adminlte.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('backend/css/jquery.dataTables.min.css')}}">


    @stack('styles')
  
</head>