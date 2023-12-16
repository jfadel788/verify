<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyEmail;
class email extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = User::pluck('email')->toArray();

        $data=['title'=>'programing','body'=>'php'];
        foreach($emails as $email){
             Mail::to($email)->send(new NotifyEmail($data));


        }

    }
}
