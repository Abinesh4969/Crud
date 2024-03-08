<?php

namespace App\Console\Commands;

use App\Models\User;
use Hash;
use Illuminate\Console\Command;

class demo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'user Added';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new User;
        $user->name = 'abinesh';
        $user->email = 'abinesh"' . now() . '"@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();

        
    }
}
