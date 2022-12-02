<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemaindMail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Remainder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:remaind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to remainder user after the reservations';

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
        $users = User::all();
        
        foreach($users as $user){
            Mail::to($user->email)->send(new RemaindMail($user));
        }
    }
}
