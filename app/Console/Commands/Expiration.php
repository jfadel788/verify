<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'user exipre every 5 minutes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user= User::Where('expire',0)->get();
        foreach($user as $user){
            $user->update(['expire'=>1]);
        }
    }
}
