<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | Новости Харькова</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="/css/flexslider.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Modernizr JS -->
    <script src="/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
    
    <!-- Laravel Like Comment System-->
    
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
    <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>


    <!-- JS подсказки для поиска по тегам -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


</head>
<body>

<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>

    <aside id="colorlib-aside" role="complementary" class="js-fullheight">

        <h1 id="colorlib-logo">
            <a href="{{ url('/') }}">НОВОСТИ ХАРЬКОВА</a>
        </h1>
        <div class="side">
            <div class="container" style="width:100%;">
                <form id="tagsearchform" autocomplete="off">
                    <div class="form-group">
                        <input type="text" class="typeahead form-control" name="tagsearch" id="search" placeholder="Поиск по тегам...">
                        <a href="#" id="tagsubmit" onclick="event.preventDefault(); yourFunction()">
                           Искать
                        </a>
                </form>
                    <script>
                            function yourFunction(){ 
 $.ajax({    
        type: "GET",
        url: "{{ route('autocomplete') }}",             
        dataType: "json",                
        success: function(response){                    
            var tagsarray = [];
            response.forEach(element => {
            tagsarray.push(element.name);
            });
            if (jQuery.inArray( document.getElementsByName("tagsearch")[0].value, tagsarray ) == -1) {
                //$("#tagsearchformmessage").html("ТАКОГО ТЕГА НЕТ!!!");
                alert ('ТАКОГО ТЕГА НЕТ!');
                return false;
            }
            else {
                var url = "/tag/" + document.getElementsByName("tagsearch")[0].value;                      
                $( location ).attr("href", url);
            }
        }

    });
                            
                             
                            }
                    
                            var path = "{{ route('autocomplete') }}";
                            $('input.typeahead').typeahead({
                                source:  function (query, process) {
                                    return $.get(path, { query: query }, function (data) {
                                        return process(data);
                                    });
                                }
                            });
                    </script>
                </form>
                <div id="tagsearchformmessage"></div>
            </div>




        </div>

        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                @foreach($categories as $category)

                    <li>
                        <a href="/category/{{ $category->name }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div>
            <!-- Authentication Links -->
            @guest
        <div>
            <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="true">Вход</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Регистрация</a>
                  </div>
            </nav>
                <div class="tab-content active" id="nav-tabContent">
                  <div class="tab-pane active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                      <div id=loginDiv"" class="card">

                                <div class="card-body">
                                    <form id="loginForm" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Адрес E-Mail') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Запомнить меня') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Войти') }}
                                                </button>

                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Забыли пароль?') }}
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div id="loginFormMessage"></div>
                                    </form>
                                </div>
            </div>
                  
                     <!-- <script>

                      var loginForm = $("#loginForm");
                     

                      
                            loginForm.submit(function(e){
                                e.preventDefault();
                                var formData = loginForm.serialize();
                               
                                $.ajax({
                                    url:'/login',
                                    type:'POST',
                                    data:formData,
                     
                                    success:function(data){
                                        console.log(data);
                                        
                                        loginForm.replaceWith("ЗДРАВСТВУЙТЕ, "+ data.name + "! <br>ВЫ УСПЕШНО ВОШЛИ!<br><div><form id='logout-form' action='/logout' method='POST' ><input  type='submit' value='Выйти'><input type='hidden' name='_token' value='{{ csrf_token() }}'></form></div>");                      
                                
               
                                                              
                                $("#logout-form").submit(function(e){
                                e.preventDefault();
                                var formData = $("#logout-form").serialize();
                               
                                $.ajax({
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    url:'/logout',
                                    type:'POST',
                                    data:formData,
                     
                                    success:function(data){
                                        console.log(data);
                                        
                                        $("#logout-form").replaceWith("ВЫ УСПЕШНО ВЫШЛИ!");                      
                                                        },
                                                            error: function (data) {
                                                                console.log(data);
                                                           
                                                            }
                                                        });
                                                    });  
       
                                        
                                                        },
                                                            error: function (data) {
                                                                console.log(data);
                                                                $("#loginFormMessage").replaceWith('ЛОГИН ИЛИ ПАРОЛЬ НЕВЕРНЫ! ПОПРОБУЙТЕ ЕЩЕ РАЗ!');
                                                            }
                                                        });
                                                    });    
                                                    
                                                    
                                                    
                                                    
                                                    
                                

                      
                      </script> -->
                  
                  
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  
                                  <div class="card">
                               

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Логин') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Адрес E-Mail') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Подтвердить пароль') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Зарегистрироваться') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                  
                  
                  
                  
                  
                  </div>
                </div>
            
        </div>
            
            @else
                <div class="nav-item dropdown">
                    <span>
                        Здравствуйте, {{ Auth::user()->name }}!
                    </span>

                    <div>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                           {{ __('Выйти') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
        




        <div>
            <p><small>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </span> <span>Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash.com</a> &amp; <a href="https://www.pexels.com/" target="_blank">Pexels.com</a></span></small></p>
        </div>

    </aside>

    <div id="colorlib-main" class="col-md-9">
        
        @yield('content')

    </div>

</div>


<!-- jQuery Easing -->
<script src="/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="/js/jquery.flexslider-min.js"></script>
<!-- Owl Carousel -->
<script src="/js/owl.carousel.min.js"></script>


<!-- MAIN JS -->
<script src="/js/main.js"></script>

</body>
</html>