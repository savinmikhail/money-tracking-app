<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBanknoteRequest;
use Illuminate\Http\Request;

class Banknote extends Controller
{
 public function list()
 {
//     $banknotes = Banknote::orderByDesc('created_at')
//         ->get();
//     $banknotes = Banknote::get();

//    return view('list', [
//        'banknotes' => $banknotes
//    ]);
 }
    public function create()
    {

    }
    public function store(StoreBanknoteRequest $request)
    {

//        echo 'test';
//        die();
        $banknote = Banknote::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password),
        ]);

        return redirect(route('banknote.index'));
//        return redirect()->route('home');
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
