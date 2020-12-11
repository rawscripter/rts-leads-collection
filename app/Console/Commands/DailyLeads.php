<?php

namespace App\Console\Commands;

use App\Mail\DailyLeadsEntryMail;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyLeads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailyLeads:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to Admin of daily total new leads.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $leads['new_leads'] = Customer::where('created_at', Carbon::today())->get()->count();
        $leads['already_have'] = Customer::where('feedback', '-1')->where('created_at', Carbon::today())->get()->count();
        $leads['not_interested'] = Customer::where('feedback', '0')->where('created_at', Carbon::today())->get()->count();
        $leads['interested'] = Customer::where('feedback', '1')->where('created_at', Carbon::today())->get()->count();
        $leads['highly_interested'] = Customer::where('feedback', '2')->where('created_at', Carbon::today())->get()->count();
        $leads['urgent'] = Customer::where('feedback', '3')->where('created_at', Carbon::today())->get()->count();

        Mail::to('shuvogoswamii@gmail.com')->send(new DailyLeadsEntryMail($leads));

        $this->info('Email Sent.' . $leads);


    }
}
