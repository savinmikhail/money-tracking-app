<?php

namespace App\Services;

use App\Models\BanknoteCheckpoint;
use Illuminate\Support\Facades\File;


class CheckpointService
{
    public function store($data, $id)
    {
        try {
        // Create a new checkpoint record with the provided data
        BanknoteCheckpoint::create([
            'longitude' => $data['longitude'],
            'latitude' => $data['latitude'],
            'comment' => $data['comment'],
            'image_path' => $data['image_path'],
            'date' => $data['date'],
            'banknote_id' => $id,
        ]);
        }
        catch (\Exception $e) {
            if (isset($imagePath)) {
                // Delete the stored image if an exception occurs
                File::delete($imagePath);
            }
        }
    }
}
