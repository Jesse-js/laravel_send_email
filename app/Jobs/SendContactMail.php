<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected User $user,
        protected array $data
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sent = Mail::to($this->user)->send(new ContactMail([
            'fromName' => $this->data['name'],
            'fromEmail' => $this->data['email'],
            'subject' => $this->data['subject'],
            'message' => $this->data['message']
        ]));
    }
}
