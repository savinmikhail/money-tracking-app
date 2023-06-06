<?php

namespace App\Services;

use App\Models\Banknote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BanknoteService
{

    public function store($request)
    {

        // Start a database transaction
        DB::beginTransaction();

        // Check if a banknote with the provided serial number already exists
        $banknote = Banknote::where('serial_number', $request->serial_number)->first();
        $user = Auth::user();

        try {

            if ($banknote) {
                // Banknote already exists, attach the user to it
                $banknote->users()->attach($user);
            } else {
                // Create a new banknote with the provided data
                $banknote = Banknote::create([
                    'serial_number' => $request->serial_number,
                    'price' => $request->price,
                ]);
                $banknote->users()->attach($user);
            }
            // Commit the transaction
            DB::commit();

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
