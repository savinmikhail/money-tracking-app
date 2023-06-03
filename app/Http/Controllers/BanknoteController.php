<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBanknoteRequest;
use App\Models\Banknote;
use Illuminate\Support\Facades\Auth;


class BanknoteController extends Controller
{

    public function list()
     {
        $user = Auth::user();
        $banknotes = $user->banknotes;

             return view('home', ['banknotes' => $banknotes]);
     }

    public function store(StoreBanknoteRequest $request)
    {
        $banknote = Banknote::create([
            'serial_number' => $request->serial_number,
            'price' => $request->price,
        ]);
        $user = Auth::user();

        $banknote->users()->attach($user);

        return redirect(route('home'));
    }


}
