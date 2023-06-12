<?php

namespace App\Services;

use Illuminate\Http\Request;
class CheckpointDataTransformer
{
    public function transform(Request $request): array
    {
        // Store the uploaded image in the 'public/images' directory
        $imagePath = $request->file('image')->store('public/images');

        // Adjust the image path to use the 'storage' directory instead of 'public'
        $imagePath = str_replace('public/', 'storage/', $imagePath);

        return [
            'longitude' => $request->lng,
            'latitude' => $request->ltd,
            'comment' => $request->comment,
            'image_path' => $imagePath,
            'date' => $request->date,
        ];
    }
}
