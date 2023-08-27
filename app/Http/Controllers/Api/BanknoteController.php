<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreBanknoteRequest;
use App\Services\BanknoteService;
use Illuminate\Http\JsonResponse;
use App\Services\BanknoteDataTransformer;
use App\Models\User;
use App\Http\Controllers\Controller;


class BanknoteController extends Controller
{
    protected BanknoteService $banknoteService;

    public function __construct(BanknoteService $banknoteService)
    {
        $this->banknoteService = $banknoteService;
    }

    public function list($userId): JsonResponse
    {
        $user = User::query()->find($userId);
        $banknotes = $user->banknotes;
        return response()->json(['banknotes' => $banknotes]);
    }

    public function store(StoreBanknoteRequest $request): JsonResponse
    {
        $response = $this->banknoteService->store($request->validated());
        return response()->json($response);
    }
}
