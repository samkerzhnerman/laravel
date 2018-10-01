<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
	function admin() {
        if (Auth::check()) {
        echo "Logged in";
        }
        else echo "logged out";
        }
}
