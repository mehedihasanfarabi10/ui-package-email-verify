<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class makeDummyUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create some dummy user ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $user = $this->argument('count');
        for ($i=0; $i <$user ; $i++) { 
            # code...
            User::factory()->create();
            // php artisan create:user 5
        }
    }
}
