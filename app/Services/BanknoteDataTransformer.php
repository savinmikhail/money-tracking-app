<?php

namespace App\Services;

use Illuminate\Http\Request;

class BanknoteDataTransformer
{
    public function transform(Request $request): array
    {
        return [
            'serial_number' => $request->serial_number,
            'price' => $request->price,
        ];
    }
}
