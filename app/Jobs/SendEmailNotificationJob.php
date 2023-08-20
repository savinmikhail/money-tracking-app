<?php

namespace App\Jobs;

use App\Mail\User\PasswordMail;
use App\Models\Banknote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customers;
    protected $banknote;
    /**
     * Create a new job instance.
     */
    public function __construct($id)
    {
        $this->banknote = Banknote::find($id);

        //retrieve the users that own this banknote
        $this->customers = $this->banknote->users;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
            foreach ($this->customers as $customer) {
                Mail::to($customer->email)->send(new PasswordMail($customer->name, $this->banknote->serial_number));
            }
    }
}
