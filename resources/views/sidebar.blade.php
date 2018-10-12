<?php
/**
 * Created by PhpStorm.
 * User: samkerzhnerman
 * Date: 10/8/18
 * Time: 11:59 AM
 */
@section('sidebar')
<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
	<aside id="colorlib-aside" role="complementary" class="js-fullheight">

		<h1 id="colorlib-logo">
			<a href="{{ url('/') }}">News Website</a>
		</h1>
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </div>

    <div class="colorlib-footer">
        <p><small>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </span> <span>Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash.com</a> &amp; <a href="https://www.pexels.com/" target="_blank">Pexels.com</a></span></small></p>
        <ul>
            <li><a href="#"><i class="icon-facebook2"></i></a></li>
            <li><a href="#"><i class="icon-twitter2"></i></a></li>
            <li><a href="#"><i class="icon-instagram"></i></a></li>
            <li><a href="#"><i class="icon-linkedin2"></i></a></li>
        </ul>
    </div>

    </aside>
@show