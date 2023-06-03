<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBanknoteRequest;
use App\Models\Banknote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        try {
            DB::beginTransaction();

            $banknote = Banknote::where('serial_number', $request->serial_number)->first();

            if ($banknote) {
                // Banknote already exists, attach the user
                $user = Auth::user();
                $banknote->users()->attach($user);
            } else {
                // Create a new banknote
                $banknote = Banknote::create([
                    'serial_number' => $request->serial_number,
                    'price' => $request->price,
                ]);

                $user = Auth::user();
                $banknote->users()->attach($user);
            }

            DB::commit();

            return redirect(route('home'));
        } catch (\Exception $e) {
            DB::rollback();
            //            $errorMessage = $e->getMessage();
            // Handle the exception or display an error message
            return back()->withError('An error occurred. Please try again.');
            //return back()->withError($errorMessage);
        }
    }


}
