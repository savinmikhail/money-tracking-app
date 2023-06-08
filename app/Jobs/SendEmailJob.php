<?php

namespace App\Jobs;

use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    public $request;
//    public $name;
//    public $email;
    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
//        $this->request = $request;
//        $this->name = $name;
//        $this->email = $email;
        $this->user = $user;
    }

    /**
     * Execute the job.
    */
//    public function handle(): void
//    {
//        echo 'text is working';
//    }
//public function handle(): void
//    {
//        Mail::to($this->request->email)->send(new PasswordMail($this->request->name));
//    }


   public function handle(): void
    {
        event(new Registered($this->user));
    }
//    public function handle(): void
//    {
//        Mail::to($this->user->email)->send(new PasswordMail($this->user->name));
//    }
//    public function handle(): void
//    {
//        Mail::to($this->email)->send(new PasswordMail($this->name));
//    }
//   public function handle(): void
//    {
//        Mail::to($this->request->email)->send(new PasswordMail($this->request->name));
//    }
}
