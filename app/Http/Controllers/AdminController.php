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
        $status = Auth::user()->isAdmin();
        var_dump($status);
        }
        else echo "logged out";
        }
}
