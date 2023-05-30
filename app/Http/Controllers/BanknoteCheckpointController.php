<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckpointRequest;
use App\Http\Requests\StoreBanknoteRequest;
use App\Models\BanknoteCheckpoint;
use Illuminate\Http\Request;

class BanknoteCheckpointController extends Controller
{
    public function update(Request $request): string
    {
        $path = $request->file('avatar')->store('avatars');

        return $path;
    }

    public function store(CheckpointRequest $request)
    {

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = str_replace('public/', 'storage/', $imagePath); // Remove 'public/' from the file path


            $checkpoint = BanknoteCheckpoint::create([
                'location' => $request->location,
                'comment' => $request->comment,
                'image_path' => $imagePath,
                //must be removed
                'banknote_id' => $request->banknote_id,
            ]);

            return redirect(route('checkpointList'));
//        return redirect()->route('home');
        }
    }
}
