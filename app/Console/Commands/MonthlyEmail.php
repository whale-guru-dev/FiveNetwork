<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Model\MemberMonthlyEmail;
use Mail;
use App\Mail\Monthly;

class MonthlyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Monthly:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Montly Email to Members';

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
     * @return mixed
     */
    public function handle()
    {
        $members = User::all();
        foreach($members as $member)
        {
            $code = $this->generateRandomString(10);
            if(date('m') - 1 == 0)
                $year = date('Y') - 1;
            MemberMonthlyEmail::create([
                'usid' => $member->id,
                'year' => $year,
                'month' => date('m') - 1,
                'code' => $code
            ]);

            $link = route('monthly-email',['year' => date('Y'), 'month' => date('m'), 'memberid' => $member->id, 'code' => $code]);
            $subject = 'Monthly Email To FiveNetwork Members';

            Mail::to($member->email)->send(new Monthly($link, $subject));
        }
    }

    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
