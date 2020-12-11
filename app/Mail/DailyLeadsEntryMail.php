<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyLeadsEntryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $totalLeads;

    /**
     * Create a new message instance.
     *
     * @param $totalLeads
     */
    public function __construct($totalLeads)
    {
        $this->totalLeads = $totalLeads;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@rawtechsociety.com', 'RTS Marketing App')
            ->view('email.DailyTotalLeadsEmail', [
                'data' => $this->totalLeads
            ]);
    }
}
