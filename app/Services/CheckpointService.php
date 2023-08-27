<?php

namespace App\Services;

use App\Models\BanknoteCheckpoint;
use Illuminate\Support\Facades\File;


class CheckpointService
{
    public function store($data, $id): array
    {
        try {
            // Create a new checkpoint record with the provided data
            $banknoteCheckpoint = BanknoteCheckpoint::query()->create([
                'longitude' => $data['longitude'],
                'latitude' => $data['latitude'],
                'comment' => $data['comment'],
                'image_path' => $data['image_path'],
                'date' => $data['date'],
                'banknote_id' => $id,
            ]);
            return ['success' => true, 'data' => $banknoteCheckpoint];
        }
        catch (\Exception $e) {
            if (isset($imagePath)) {
                // Delete the stored image if an exception occurs
                File::delete($imagePath);
            }
            return ['success' => false, 'data' => $e];
        }
    }
}
