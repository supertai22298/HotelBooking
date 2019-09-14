<?php

namespace App\Jobs;

use Mail;
use App\Mail\MailForReply;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReplyEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new MailForReply($this->data);
        $email->subject($this->data['subject']);
        if($this->data['active'] == 1){
            $email->cc($this->data['admin_email']);
        }
        Mail::to($this->data['email'])->send($email);
    }
}
