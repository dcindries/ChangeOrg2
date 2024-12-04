<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Peticione;
use App\Models\Categoria;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
}
