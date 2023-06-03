<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckpointRequest;
use App\Models\Banknote;
use App\Models\BanknoteCheckpoint;


class BanknoteCheckpointController extends Controller
{

    public function index($id)
    {
        $banknote_id = $id;
        $checkpoints = Banknote::find($id)->getCheckpoint;
        $serial_number = Banknote::find($id)->pluck('serial_number')->first();
        return view('checkpoint', ['checkpoints' => $checkpoints, 'banknote_id' => $banknote_id, 'serial_number' => $serial_number]);
    }


    public function store(CheckpointRequest $request, $id)
    {

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = str_replace('public/', 'storage/', $imagePath); // Remove 'public/' from the file path


            $checkpoint = BanknoteCheckpoint::create([
                'longitude' => $request->lng,
                'latitude' => $request->ltd,

                'comment' => $request->comment,
                'image_path' => $imagePath,
                'date' => $request->date,
                'banknote_id' => $id,
            ]);
            $pathForRedirect = '/checkpoint/' . $id;
            return redirect($pathForRedirect);

        }
    }
}
