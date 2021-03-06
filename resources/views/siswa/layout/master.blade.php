

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="/css/summernote.css"> 
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <link href="css/style-nav22072020.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script> 
    <script src="/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="/DataTables/css/jquery.dataTables.min.css"></script>



    <title>@yield('title')</title>
   
</head>
<style>
    .btn-xl{
        width:400px;

    }
    .nav-height{
        height:60px;
    }
   
</style>
<body class="bg-light  ">
<div class="nav-height">
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar fixed-top navbar-expand navbar-dark bg-white d-flex justify-content-between">
        <div>  
        <button class="btn btn-link btn-lg order-1 order-lg-0 text-black-50 " id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button ><!-- Navbar Search-->
        <b>MySMK</b>  
    </div>
            <!-- Navbar-->
            <div class="d-flex">

            <ul class="navbar-nav ml-auto ml-md-0 ">
            <li class="nav-item dropdown ">
           
                                <a  id="navbarDropdown" class="nav-link dropdown-toggle text-bold text-black-50" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-black-50 p- pt-3 pb-3" aria-labelledby="navbarDropdown">
                                <img style="display:block;" class="rounded-circle mx-auto mb-3" src="/img/avatar.jpeg" height="60" width="60" alt="">    
                                <div class="text-center menu-drop">
                                <a class="dropdown-item" href="#">
                                    {{ Auth::user()->email }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
            </ul>
            <img class="rounded-circle mt-1" src="/img/avatar.jpeg" height="40" width="40" alt="">
            </div>
        </nav>
        </div>
</div>
@yield('content')

            </div>
        </div>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
       

</body>
</html>

