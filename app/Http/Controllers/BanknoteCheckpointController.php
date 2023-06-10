<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckpointRequest;
use App\Jobs\SendEmailNotificationJob;
use App\Jobs\SendEmailVerificationJob;
use App\Models\Banknote;
use App\Services\CheckpointService;

class BanknoteCheckpointController extends Controller
{
    protected $checkpointService;

    public function __construct(CheckpointService $checkpointService)
    {
        $this->checkpointService = $checkpointService;
    }

    public function index($banknote_id)
    {

        $banknote = Banknote::find($banknote_id);

        // Retrieve the checkpoints associated with the banknote
        $checkpoints = $banknote->checkpoints;

        // Retrieve the serial number of the banknote
        $serial_number = $banknote->serial_number;

        // Pass the data to the view
        return view('checkpoint', ['checkpoints' => $checkpoints, 'banknote_id' => $banknote_id, 'serial_number' => $serial_number]);
    }

    public function store(CheckpointRequest $request, $id)
    {
            $this->checkpointService->store($request, $id);

            $banknote = Banknote::find($id);

            //retrieve the users that own this banknote
            $customers = $banknote->users;

            SendEmailNotificationJob::dispatch($customers, $banknote)->onQueue('default');

            // Redirect the user to the checkpoint page for the associated banknote
            $pathForRedirect = '/checkpoint/' . $id;
            return redirect($pathForRedirect);
    }

}
