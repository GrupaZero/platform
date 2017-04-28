<?php

namespace App\Jobs;

use Gzero\Entity\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail implements ShouldQueue {
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer $mailer
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $mailer->send(
            'emails.auth.welcome',
            ['user' => $this->user],
            function ($m) {
                $m->to($this->user->email, $this->user->name)
                    ->subject(trans('emails.welcome.subject', ['siteName' => config('app.name')]));
            }
        );
    }
}
