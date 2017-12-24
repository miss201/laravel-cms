<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $to;
    protected $theme;
    protected $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to, $theme, $conent)
    {
        $this->to = $to;
        $this->theme = $theme;
        $this->content = $conent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $content = $this->content;
        Mail::raw($content, function ($message) {
            $to = $this->to;
            $theme = $this->theme;
            $message->to($to)->subject($theme);
        });
        Log::info('queue send mail');
    }
}
