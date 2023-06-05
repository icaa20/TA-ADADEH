<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Karyawan extends Controller
{
    function index()
    {
        //echo "Ini Halaman Home";
        echo env("API_URL")."view";
    }
}
