<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBanknoteRequest;
use App\Models\Banknote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanknoteController extends Controller
{
 public function list()
 {
         $checkpoints = DB::table('banknote_checkpoints')->get();
         return view('checkpoint', ['checkpoints' => $checkpoints]);
 }
    public function create()
    {

    }
    public function store(StoreBanknoteRequest $request)
    {
        $banknote = Banknote::create([
            'serial_number' => $request->serial_number,
            'price' => $request->email,
        ]);
        return redirect(route('checkpoint'));
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
