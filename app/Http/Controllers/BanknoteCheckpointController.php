<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckpointRequest;
use App\Http\Requests\StoreBanknoteRequest;
use App\Models\Banknote;
use App\Models\BanknoteCheckpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanknoteCheckpointController extends Controller
{
    public function list()
    {
        $checkpoints = DB::table('banknote_checkpoints')->get();
        return view('checkpoint', ['checkpoints' => $checkpoints]);
    }
    public function index($id)
    {
//         return Banknote::find($id)->getCheckpoint;
        $banknote_id = $id;
        $checkpoints = Banknote::find($id)->getCheckpoint;
        return view('checkpoint', ['checkpoints' => $checkpoints, 'banknote_id' => $banknote_id]);
    }
//    public function update(Request $request): string
//    {
////        $path = $request->file('avatar')->store('avatars');
////
////        return $path;
//    }

    public function store(CheckpointRequest $request, $id)
    {

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = str_replace('public/', 'storage/', $imagePath); // Remove 'public/' from the file path


            $checkpoint = BanknoteCheckpoint::create([
                'location' => $request->location,
                'comment' => $request->comment,
                'image_path' => $imagePath,
                //must be removed
                'banknote_id' => $id,
            ]);
            $pathForRedicrect = '/checkpoint/' . $id;
            return redirect($pathForRedicrect);
//        return redirect()->route('home');
        }
    }
}
