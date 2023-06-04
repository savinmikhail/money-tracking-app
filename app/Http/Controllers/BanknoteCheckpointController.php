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

        // Retrieve the checkpoints associated with the banknote
        $checkpoints = Banknote::find($id)->getCheckpoint;

        // Retrieve the serial number of the banknote
        $serial_number = Banknote::find($id)->pluck('serial_number')->first();

        // Pass the data to the view
        return view('checkpoint', ['checkpoints' => $checkpoints, 'banknote_id' => $banknote_id, 'serial_number' => $serial_number]);
    }

    public function store(CheckpointRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            // Store the uploaded image in the 'public/images' directory
            $imagePath = $request->file('image')->store('public/images');

            // Adjust the image path to use the 'storage' directory instead of 'public'
            $imagePath = str_replace('public/', 'storage/', $imagePath);

            // Create a new checkpoint record with the provided data
            $checkpoint = BanknoteCheckpoint::create([
                'longitude' => $request->lng,
                'latitude' => $request->ltd,
                'comment' => $request->comment,
                'image_path' => $imagePath,
                'date' => $request->date,
                'banknote_id' => $id,
            ]);

            // Redirect the user to the checkpoint page for the associated banknote
            $pathForRedirect = '/checkpoint/' . $id;
            return redirect($pathForRedirect);
        }
    }
}
