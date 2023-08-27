<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBanknoteRequest;
use App\Services\BanknoteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Services\BanknoteDataTransformer;
use App\Models\User;


class BanknoteController extends Controller
{
    public function __construct(protected BanknoteService $banknoteService)
    {
    }

    public function list()
    {

        // Retrieve the authenticated user
        $user = Auth::user();

        // Retrieve the banknotes associated with the user
        $banknotes = $user->banknotes;

        // Pass the banknotes to the view
        return view('home', ['banknotes' => $banknotes]);
    }

    public function store(StoreBanknoteRequest $request)
    {
        $response = $this->banknoteService->store($request->validated());
        return redirect(route('home'));
    }
}
