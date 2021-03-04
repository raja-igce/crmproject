<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Models\Education;

class SendWelcomeMail implements ShouldQueue
{
    use   Dispatchable,InteractsWithQueue, Queueable, SerializesModels;
    public $parameter;
    public $content;
    public function __construct($content, $parameter)
    {
        $this->content =$content;
        $this->parameter =$parameter;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $content = $this->content;
        $parameter = $this->parameter;

        Mail::send('mailTemplate.CommonTemplate', ['line1' => $content, 'line2' => $parameter['line2']], function ($message) use ($parameter) {
            $message->from(FromMail, "Registered As Volunteer");
            $message->subject("Welcome to innerEye!");
            $message->to($parameter['email'], 'innerEye');
        });
    }
}
