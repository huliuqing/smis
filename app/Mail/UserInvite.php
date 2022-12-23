<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserInvite extends Mailable
{
    use Queueable, SerializesModels;

    protected $inviter;// 邀请人
    protected $inviteeEmail;// 被邀请人邮件
    protected $school;// 邀请加入的学校

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inviter, $inviteeEmail, $school)
    {
        $this->inviter = $inviter;
        $this->inviteeEmail = $inviteeEmail;
        $this->school = $school;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = $this->buildInviteUrl();

        return $this->subject($this->buildTitle())
            ->to($this->inviteeEmail)
            ->view('invite', [
                'inviter' => $this->inviter,
                'school' => $this->school,
                'url' => $url
            ]);
    }

    public function buildTitle()
    {
        return '学校【' . $this->school->name . '】邀请你加入';
    }

    public function buildInviteUrl()
    {
        $parts = [
            'school_id' => $this->school->id,
            'email' => $this->inviteeEmail,
            'mode' => 'invite',
        ];
        return env('APP_URL') . '/#/smis/invite/register?' . http_build_query($parts);
    }
}
