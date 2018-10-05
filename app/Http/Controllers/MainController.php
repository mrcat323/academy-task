<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
    * Our Home page.
    * If our visitor is not a guest, he is a user, we redirect him to HOME page.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
      if (auth()->check()) {
          return redirect('/home');
      }
      return view('pages.index');
    }

}
