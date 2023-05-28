<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Banknote extends Controller
{
 public function list()
 {
     $banknotes = Banknote::orderByDesc('created_at')
         ->get();

    return view('list', [
        'banknotes' => $banknotes
    ]);
 }
    public function create()
    {

    }
    public function store()
    {

    }
    public function edit($banknote)
    {

    }
    public function update($banknote)
    {

    }
    public function destroy($banknote)
    {

    }
}
