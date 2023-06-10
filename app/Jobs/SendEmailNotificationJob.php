<?php

namespace App\Jobs;

use App\Mail\User\PasswordMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
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
    public function __construct($customers, $banknote)
    {
        $this->customers = $customers;
        $this->banknote = $banknote;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//        try {
            foreach ($this->customers as $customer) {
                Mail::to($customer->email)->send(new PasswordMail($customer->name, $this->banknote->serial_number));
            }
//        }
//        catch (\Exception $e) {


            //            $errorMessage = $e->getMessage();
            // Handle the exception or display an error message
//            return back()->withError('An error occurred. Please try again.');
//            return back()->withError($errorMessage);
//        }
//        foreach ($this->customers as $this->customer){
//            Mail::to($this->customer->email)->send(new PasswordMail($this->customer->name));
//        }
    }
}
