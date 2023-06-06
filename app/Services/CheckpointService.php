<?php

namespace App\Services;

use App\Models\BanknoteCheckpoint;
use Illuminate\Support\Facades\File;


class CheckpointService
{
    public function store($request, $id)
    {
        try {
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
        }
        catch (\Exception $e) {
            if (isset($imagePath)) {
                // Delete the stored image if an exception occurs
                File::delete($imagePath);
            }
            // Delete the created row if an exception occurs
            if (isset($checkpoint)) {
                $checkpoint->delete();
            }
        }
    }
}
