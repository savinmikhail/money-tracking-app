<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBanknoteRequest;
use App\Services\BanknoteService;
use Illuminate\Support\Facades\Auth;

class BanknoteController extends Controller
{
    protected $banknoteService;

    public function __construct(BanknoteService $banknoteService)
    {
        $this->banknoteService = $banknoteService;
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
        $this->banknoteService->store($request);

        // Redirect the user to the home page
        return redirect(route('home'));
    }


}
