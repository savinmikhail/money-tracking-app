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
        // Retrieve the authenticated user
        $user = Auth::user();

        // Retrieve the banknotes associated with the user
        $banknotes = $user->banknotes;

        // Pass the banknotes to the view
        return view('home', ['banknotes' => $banknotes]);
    }

    public function store(StoreBanknoteRequest $request)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Check if a banknote with the provided serial number already exists
            $banknote = Banknote::where('serial_number', $request->serial_number)->first();

            if ($banknote) {
                // Banknote already exists, attach the user to it
                $user = Auth::user();
                $banknote->users()->attach($user);
            } else {
                // Create a new banknote with the provided data
                $banknote = Banknote::create([
                    'serial_number' => $request->serial_number,
                    'price' => $request->price,
                ]);

                $user = Auth::user();
                $banknote->users()->attach($user);
            }
            // Commit the transaction
            DB::commit();

            // Redirect the user to the home page
            return redirect(route('home'));
        } catch (\Exception $e) {

            // An exception occurred, rollback the transaction
            DB::rollback();

            //            $errorMessage = $e->getMessage();
            // Handle the exception or display an error message
            return back()->withError('An error occurred. Please try again.');
            //return back()->withError($errorMessage);
        }
    }


}
