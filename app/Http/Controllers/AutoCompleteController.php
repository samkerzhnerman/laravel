<?php
/**
 * Created by PhpStorm.
 * User: samkerzhnerman
 * Date: 10/10/18
 * Time: 9:50 PM
 */

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;


class AutoCompleteController extends Controller

{

    public function index()

    {

        return view('search');

    }


    public function autocomplete(Request $request)

    {

        $data = Tag::select("name")

            ->where("name","LIKE","%{$request->input('query')}%")

            ->get();

        return response()->json($data);

    }

}