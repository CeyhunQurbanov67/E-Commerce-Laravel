<?php

namespace App\Http\Controllers\Idareetme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sifarisler;
use Illuminate\Support\Facades\Cache;

class esasSehifeController extends Controller
{
    public function index()
    {
        return view("Idareetme.esassehife");
    }
}
