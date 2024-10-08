<?php

namespace App\Jobs;

use App\Mail\PostMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $postMail;

    /**
     * Create a new job instance.
     */
    public function __construct($postMail)
    {
        $this->postMail = $postMail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->postMail['email'])->send(new PostMail ([
            'title' => $this->postMail['title'],
            'status' => $this->postMail['status'],
            'role' => $this->postMail['role'] ?? null,
            'role_to' => $this->postMail['role_to'] ?? null,
            'body' => $this->postMail['body'],
        ]));
    }
}
