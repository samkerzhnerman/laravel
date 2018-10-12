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

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

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
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/magnific-popup.css">
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




    <style>


        #wd1_nlpopup_overlay { display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:#333333; opacity:.8; z-index:9999; }
        #wd1_nlpopup { display:none; position:absolute; width:50%; top:100px; left:50%; margin-left:-25%; z-index:9999; background:white; -webkit-box-shadow:0 0 20px #000; box-shadow:0 0 20px #000; border-radius:5px; border:5px solid rgba(0, 0, 0, 0.5); -webkit-background-clip:padding-box; -moz-background-clip:padding-box; background-clip:padding-box; font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", "HelveticaNeue", "HelveticaNeueLT", Helvetica, Arial, "Lucida Grande", sans-serif; -webkit-transition:all 0.5s ease; -moz-transition:all 0.5s ease; -o-transition:all 0.5s ease; -ms-transition:all 0.5s ease; transition:all 0.5s ease;}

        /*
        #wd1_nlpopup_overlay * {-webkit-transition:all .1s linear;-moz-transition:all .1s linear; -o-transition:all .1s linear;-ms-transition:all .1s linear;transition:all .1s linear;}
        */

        #wd1_nlpopup_close { position:absolute; top:-13px; right:-13px; display:inline-block; text-align:center; width:22px; height:22px; border-radius:3px; color:white; font-family:sans-serif; font-weight:900; font-size:18px; line-height:21px; background:rgba(0,0,0,0.9) url("http://www.1stwebdesigner.com/wp-content/plugins/newsletter-popup/css/../img/close.png") no-repeat 5px 5px; text-indent:-99999px; }
        #wd1_nlpopup h2 { font-size:22px; line-height:30px; margin:1.2em 3.5em; font-family:"HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", "HelveticaNeue", "HelveticaNeueLT", Helvetica, Arial, "Lucida Grande", sans-serif; text-align:center; }
        #wd1_nlpopup h2 span { color:#f58220; text-transform:uppercase; }
        #wd1_nlpopup .graybg { padding:10px 30px; background:#f6f6f6; border:1px solid #cccccc; border-left:0; border-right:0; overflow:auto; }
        #wd1_nlpopup .graybg img { float:left; border:1px solid #dddddd; padding:4px; background:white; margin-right:25px; }
        #wd1_nlpopup .graybg p { margin:0.6em 0 0 140px; color:#5C5C5C; font-size:13px; }
        #wd1_nlpopup .ebook { position:relative; margin:1.5em 4em; color:#5C5C5C; font-size:15px; }
        #wd1_nlpopup .ebook img.ebookpic { float:right; }
        #wd1_nlpopup .ebook p { margin:16px 0; }
        #wd1_nlpopup .spaceforbook { float:left; line-height:22px; width:60%; }
        #wd1_nlpopup ul.bulletdots { list-style-image:url("http://www.1stwebdesigner.com/wp-content/plugins/newsletter-popup/css/../img/bullet.png"); padding:0 0 0 40px; }
        #wd1_nlpopup p.centered { margin-top:45px; text-align:center; line-height:20px; }
        #wd1_nlpopup p.arrowbelow { margin-bottom:40px; clear:both; }
        #wd1_nlpopup .graybg p.quote:before { content:""; display:inline-block; width:23px; height:19px; background:url("http://www.1stwebdesigner.com/wp-content/plugins/newsletter-popup/css/../img/quote.png") no-repeat 0 0; margin-left:-38px; padding-right:17px; }
        #wd1_nlpopup .nlsubscribe:before { position:absolute; top:-33px; left:100px; content:""; display:inline-block; width:67px; height:58px; background:url("http://www.1stwebdesigner.com/wp-content/plugins/newsletter-popup/css/../img/arrow.png") no-repeat 0 0; }
        #wd1_nlpopup .nlsubscribe { position:relative; background:#f6f6f6; border-top:1px solid #cccccc; padding:30px 0; text-align:center; }
        #wd1_nlpopup .textinput { height:25px; width:200px; padding:5px 15px; border:2px solid #ccc; font-size:16px; -webkit-transition:all 0.3s ease; -moz-transition:all 0.3s ease; -o-transition:all 0.3s ease; -ms-transition:all 0.3s ease; transition:all 0.3s ease; }
        #wd1_nlpopup .textinput:focus,#wd1_nlpopup .textinput:active { outline:none; border:2px solid #F7902F; }
        #wd1_nlpopup_close:hover { background-color:rgba(50,50,50,0.7); }


        #wd1_nlpopup .btn{margin-top:-3px;display:inline-block;display:inline;zoom:1;padding:4px 14px;margin-bottom:0;font-size:14px;line-height:20px;line-height:20px;text-align:center;vertical-align:middle;text-decoration:none;cursor:pointer;color:#333333;text-shadow:0 1px 1px rgba(255,255,255,0.75);background-color:#f5f5f5;background-image:0;background-image:0;background-image:0;background-image:0;background-image:linear-gradient(top,#ffffff,#e6e6e6);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff',endColorstr='#ffe6e6e6',GradientType=0);border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-color:rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);background-color:#e6e6e6;border:1px solid #bbbbbb;border:0;border-bottom-color:#a2a2a2;border-radius:2px;margin-left:.3em;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,0.2), 0 1px 2px rgba(0,0,0,0.05);box-shadow:inset 0 1px 0 rgba(255,255,255,0.2), 0 1px 2px rgba(0,0,0,0.05);}
        #wd1_nlpopup .btn:hover,#wd1_nlpopup .btn:active,#wd1_nlpopup .btn.active,#wd1_nlpopup .btn.disabled,#wd1_nlpopup .btn[disabled]{color:#333333;background-color:#e6e6e6;background-color:#d9d9d9;}
        #wd1_nlpopup .btn:active,#wd1_nlpopup .btn.active{background-color:#cccccc 0;}
        #wd1_nlpopup .btn:first-child{margin-left:0;}
        #wd1_nlpopup .btn:hover{color:#333333;text-decoration:none;background-color:#e6e6e6;background-color:#d9d9d9;background-position:0 -15px;-webkit-transition:background-position .1s linear;-moz-transition:background-position .1s linear;-o-transition:background-position .1s linear;-ms-transition:background-position .1s linear;transition:background-position .1s linear;}
        #wd1_nlpopup .btn:focus{outline:thin dotted #333;outline:5px auto 0;outline-offset:-2px;color:white;}
        #wd1_nlpopup .btn.active,#wd1_nlpopup .btn:active{background-color:#e6e6e6;background-color:#d9d9d9 0;background-image:none;outline:0;-webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,0.15), 0 1px 2px rgba(0,0,0,0.05);box-shadow:inset 0 2px 4px rgba(0,0,0,0.15), 0 1px 2px rgba(0,0,0,0.05);}
        #wd1_nlpopup .btn-large{padding:8px 14px;font-size:16px;font-weight:900;line-height:normal;border-radius:2px;}
        #wd1_nlpopup .btn-large [class^="icon-"]{margin-top:2px;}
        #wd1_nlpopup .btn-orange.active{color:rgba(255,255,255,0.75);}
        #wd1_nlpopup .btn{border-color:#c5c5c5;border-color:rgba(0,0,0,0.15) rgba(0,0,0,0.15) rgba(0,0,0,0.25);}
        #wd1_nlpopup .btn-orange{color:#ffffff;text-shadow:none;background-color:#f7902f;background-image:0;background-image:0;background-image:0;background-image:0;background-image:linear-gradient(top,#f7902f,#f27018);-imagebackground-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff7902f',endColorstr='#fff27018',GradientType=0);border-color:#f15d0a #ed4a04 #e93502;border-color:rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);background-color:#f27018;}
        #wd1_nlpopup .btn-orange:hover,#wd1_nlpopup .btn-orange:active,#wd1_nlpopup .btn-orange.active,#wd1_nlpopup .btn-orange.disabled,#wd1_nlpopup .btn-orange[disabled]{color:#ffffff;background-color:#f27018;background-color:#f27018;}
        #wd1_nlpopup .btn-orange:active,#wd1_nlpopup .btn-orange.active{background-color:#c67605 0;}
        #wd1_nlpopup button.btn,#wd1_nlpopup input[type="submit"].btn{padding-top:3px;padding-bottom:3px;}
        #wd1_nlpopup button.btn::-moz-focus-inner,#wd1_nlpopup input[type="submit"].btn::-moz-focus-inner{padding:0;border:0;}
        #wd1_nlpopup button.btn.btn-large,#wd1_nlpopup input[type="submit"].btn.btn-large{padding-top:7px;padding-bottom:7px;}



        @media only screen and (max-width: 1400px) {
            #wd1_nlpopup .ebook { margin:1.5em 2em;  }
        }
        @media only screen and (max-width: 1280px) {
            #wd1_nlpopup img.ebookpic { width:150px; height:auto; }
            #wd1_nlpopup .ebook { margin:1.5em 4em;  }
            #wd1_nlpopup { width:60%; margin-left:-30%; }
        }
        @media only screen and (max-width: 1080px) {
            #wd1_nlpopup h2 { margin: 0.8em 2em; }
            #wd1_nlpopup .graybg { padding:10px 30px; }
            #wd1_nlpopup .ebook { margin:1.5em 2em;  }
        }
        @media only screen and (max-width: 1024px) {
            #wd1_nlpopup { width:75%; margin-left:-37.5%; }
            #wd1_nlpopup .ebook { margin:1.5em 4em;  }
        }
        @media only screen and (max-width: 860px) {
            #wd1_nlpopup .ebook { margin:1.5em 2em;  }
        }
        @media only screen and (max-width: 800px) {
            #wd1_nlpopup .textinput {width:150px; }
        }
        @media only screen and (max-width: 780px) {
            #wd1_nlpopup { top:75px; width:80%; margin-left:-40%; }
            #wd1_nlpopup h2 { margin:0.6em 1.2em; font-size:21px; }
            #wd1_nlpopup img.ebookpic { width:130px; height:auto; }
            #wd1_nlpopup p.centered { margin-top:20px; }
            #wd1_nlpopup p.arrowbelow { margin-bottom:20px; }
            #wd1_nlpopup .nlsubscribe:before { display:none; }
        }

        @media only screen and (max-width: 704px) {
            #wd1_nlpopup .spaceforbook { width:365px; }
            #wd1_nlpopup .ebook { margin-right:.5em;  }
        }
        @media only screen and (max-width: 675px) {
            #wd1_nlpopup img.ebookpic { display:none; }
            #wd1_nlpopup .spaceforbook { width:auto; }
            #wd1_nlpopup .ebook { margin:1em 1.5em;  }
            #wd1_nlpopup .nlsubscribe { padding:20px 0;}
            #wd1_nlpopup .textinput { display:block; width:80%; margin:0 auto 10px; }
            #wd1_nlpopup .btn { display:block; width:87%; margin:0 auto; padding:10px 0; }
        }
        @media only screen and (max-width: 600px) {
            #wd1_nlpopup { top:50px; }
            #wd1_nlpopup h2 { margin:0.4em 0.8em; font-size:18px; line-height:25px; }
            #wd1_nlpopup .graybg p.quote:before { display:none; }
            #wd1_nlpopup .graybg p { margin:5px 0 0 100px; }
            #wd1_nlpopup .ebook { margin:0 1.5em; font-size:13px; }
        }
        @media only screen and (max-width: 500px) {
            #wd1_nlpopup { width:90%; margin-left:-45%; }
        }
        @media only screen and (max-width: 425px) {
            #wd1_nlpopup .graybg img { width:50px; height:auto; }
            #wd1_nlpopup .graybg p { margin:0 0 0 85px; }
            #wd1_nlpopup .ebook { font-size:12px; }
            #wd1_nlpopup .ebook p { margin:10px 0 0; }
            #wd1_nlpopup ul.bulletdots { padding:0 0 0 20px; margin:5px 0 10px; }
            #wd1_nlpopup p.centered { margin:0 0 10px; }
            #wd1_nlpopup_close { right:-10px; }

        }

    </style>


    <!-- JS окно выводящееся при уходе из окна браузера -->
    <script type="text/javascript" src="/js/bioep.js"></script>
    <script type="text/javascript">
        if (bioEp != undefined) {
            bioEp.init({
                html: '',
                css: '#bio_ep{background:none; box-shadow: none}',
                delay:0,
                showOnDelay: false,
                cookieExp: 0,
                width: 1000,
                height: 650
            });
        }
    </script>


    <!-- JS подсказки для поиска по тегам -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
            <div class="container" style="width:110%;">
                <form id="tagsearchform" onsubmit="yourFunction()">
                    <div class="form-group">
                        <input type="text" class="typeahead form-control" name="tagsearch" id="search" placeholder="Поиск по тегам...">
                        <button type="submit" class="btn submit btn-primary"><i class="icon-search3"></i></button>
                    </div>
                </form>
                    <script>
                        function yourFunction(){
                    var action_src = "/tag/" + document.getElementsByName("tagsearch")[0].value;
                    var your_form = document.getElementById('tagsearchform');
                    your_form.action = action_src;}
                    </script>

                <script type="text/javascript">

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

        <div style="background-color: #e8f1f8;">
            <!-- Authentication Links -->
            @guest
                <div class="nav-item">
                    <a href="{{ route('login') }}">{{ __('Вход') }}</a>
                </div>
                <div class="nav-item">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                    @endif
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



        <div class="colorlib-footer">
            <p><small>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </span> <span>Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash.com</a> &amp; <a href="https://www.pexels.com/" target="_blank">Pexels.com</a></span></small></p>
        </div>

    </aside>

    <div id="colorlib-main" class="col-md-9">
        @include('layouts.ads')

        @yield('content')
    </div>


</div>

</div>

</div>





<div id="wd1_nlpopup_overlay"></div>


<div id="wd1_nlpopup" data-expires="30" data-delay="10">
    <a href="#closepopup" id="wd1_nlpopup_close">x</a>
    <h2>ПОДПИСЫВАЙТЕСЬ НА НАШУ РАССЫЛКУ!</h2>
    <div class="content">
       </div>
    <div class="nlsubscribe"><form action="http://www.aweber.com/scripts/addlead.pl" method="post" target="_new">
            <input type="hidden" name="meta_web_form_id" value="2022148449">
            <input type="hidden" name="meta_split_id" value="">
            <input type="hidden" name="listname" value="1stwebdesigner">
            <input type="hidden" name="redirect" value="http://www.aweber.com/thankyou-coi.htm?m=text">
            <input type="hidden" name="meta_adtracking" value="1stwebdesigner_Newsletter_Form_(_Latest)">
            <input type="hidden" name="meta_message" value="1">
            <input type="hidden" name="meta_required" value="email,name">
            <input type="hidden" name="meta_tooltip" value="">
            <input type="text" name="name" id="wd1_nlpopup_name" placeholder="Имя" value="" class="textinput" tabindex="500">
            <input type="text" name="email" id="wd1_nlpopup_mail" placeholder="Ваш email" value="" class="textinput" tabindex="501">
            <input type="submit" name="submit" id="wd1_nlpopup_submit" value="Подписаться" class="btn btn-orange btn-large" tabindex="502">
        </form></div>
</div>

<script>

    jQuery(document).ready(function($){
        var wd1_nlpopup_expires = $("#wd1_nlpopup").data("expires");
        var wd1_nlpopup_delay = $("#wd1_nlpopup").data("delay") * 15000;

        $('#wd1_nlpopup_close').on('click', function(e){
            $.cookie('wd1_nlpopup', 'closed', { expires: wd1_nlpopup_expires, path: '/' });
            $('#wd1_nlpopup,#wd1_nlpopup_overlay').fadeOut(200);
            e.preventDefault();
        });

        if($.cookie('wd1_nlpopup') != 'closed' ){
            setTimeout(wd1_open_nlpopup, wd1_nlpopup_delay);
        }

        function wd1_open_nlpopup(){
            var topoffset = $(document).scrollTop(),
                viewportHeight = $(window).height(),
                $popup = $('#wd1_nlpopup');
            var calculatedOffset = (topoffset + (Math.round(viewportHeight/2))) - (Math.round($popup.outerHeight()/2));

            if(calculatedOffset <= 40){
                calculatedOffset = 40;
            }

            $popup.css('top', calculatedOffset);
            $('#wd1_nlpopup,#wd1_nlpopup_overlay').fadeIn(500);
        }

    });



    /* jQuery Cookie Plugin v1.3.1 */
    (function(a){if(typeof define==="function"&&define.amd){define(["jquery"],a);}else{a(jQuery);}}(function(e){var a=/\+/g;function d(g){return g;}function b(g){return decodeURIComponent(g.replace(a," "));}function f(g){if(g.indexOf('"')===0){g=g.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\");}try{return c.json?JSON.parse(g):g;}catch(h){}}var c=e.cookie=function(p,o,u){if(o!==undefined){u=e.extend({},c.defaults,u);if(typeof u.expires==="number"){var q=u.expires,s=u.expires=new Date();s.setDate(s.getDate()+q);}o=c.json?JSON.stringify(o):String(o);return(document.cookie=[c.raw?p:encodeURIComponent(p),"=",c.raw?o:encodeURIComponent(o),u.expires?"; expires="+u.expires.toUTCString():"",u.path?"; path="+u.path:"",u.domain?"; domain="+u.domain:"",u.secure?"; secure":""].join(""));}var g=c.raw?d:b;var r=document.cookie.split("; ");var v=p?undefined:{};for(var n=0,k=r.length;n<k;n++){var m=r[n].split("=");var h=g(m.shift());var j=g(m.join("="));if(p&&p===h){v=f(j);break;}if(!p){v[h]=f(j);}}return v;};c.defaults={};e.removeCookie=function(h,g){if(e.cookie(h)!==undefined){e.cookie(h,"",e.extend(g,{expires:-1}));return true;}return false;};}));
</script>





<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="/js/jquery.flexslider-min.js"></script>
<!-- Magnific Popup -->
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/magnific-popup-options.js"></script>
<!-- Owl Carousel -->
<script src="/js/owl.carousel.min.js"></script>
<!-- Sticky Kit -->
<script src="/js/sticky-kit.min.js"></script>


<!-- MAIN JS -->
<script src="/js/main.js"></script>



<!-- Окно выводящееся при попытке выхода из окна браузера -->
<div id="bio_ep_bg"></div>
<div id="bio_ep" style="text-align:center; vertical-align:center; background-color: #e8f1f8; width: 500px; height: 100px;" align="center">
    <div id="bio_ep_close">X</div>
<h1>Вы действительно хотите покинуть сайт?</h1>

</div>    </div>

</body>
</html>