<?php

namespace App\Services;

use App\Models\Banknote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BanknoteService
{

    public function store($data)
    {

        $user = Auth::user();

        // Start a database transaction
        DB::beginTransaction();
        try {
            $banknote = Banknote::firstOrCreate(
                [
                    'serial_number' => $data['serial_number'],
                ],
                [
                    'price' => $data['price'],
                ]
            );

            $banknote->users()->attach($user);

            // Commit the transaction
            DB::commit();

        } catch (\Exception $e) {

            // An exception occurred, rollback the transaction
            DB::rollback();
            return back()->withError('An error occurred. Please try again.');
        }
    }
}
