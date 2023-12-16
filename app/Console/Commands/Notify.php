<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyEmail;


class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to user daily';


    public function __construct()
    {
        parent :: __construct();

    }
    /*
        *@return mixed
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
