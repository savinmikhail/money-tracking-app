<?php

namespace App\Services;

use App\Models\Banknote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BanknoteService
{

    public function store($data)
    {
        //for api
        if(isset($data['userId'])){
            $user = User::query()->find($data['userId']);
        } else {
            $user = Auth::user();
        }

        DB::beginTransaction();
        try {
            $banknote = Banknote::query()->firstOrCreate(
                [
                    'serial_number' => $data['serial_number'],
                ],
                [
                    'price' => $data['price'],
                ]
            );

            $banknote->users()->attach($user);

            DB::commit();

            return ['success' => true, 'data' => $banknote];
        } catch (\Exception $e) {

            DB::rollback();
            return ['success' => false, 'data' => $e];
        }
    }
}
