<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CheckpointRequest;
use App\Jobs\SendEmailNotificationJob;
use App\Models\Banknote;
use App\Http\Controllers\Controller;
use App\Services\CheckpointDataTransformer;
use Illuminate\Http\JsonResponse;
use App\Services\CheckpointService;

class BanknoteCheckpointController extends Controller
{
    public  function __construct(protected CheckpointService $checkpointService, protected  CheckpointDataTransformer $dataTransformer)
    {
    }
    public function index($banknote_id): JsonResponse
    {
        $banknote = Banknote::query()->find($banknote_id);

        return response()->json(['success' => true, 'data' => $banknote->checkpoints]);
    }

    public function store(CheckpointRequest $request, $id): JsonResponse
    {
        $data = $this->dataTransformer->transform($request);

        $response = $this->checkpointService->store($data, $id);

//        SendEmailNotificationJob::dispatch($id)->onQueue('default');

        return response()->json($response);
    }

}
