<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store()
    {
        return redirect()->with('Success', 'Data Added !');
    }
}
