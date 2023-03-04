<?php

namespace App\Console\Commands;

use App\Models\Data;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class SendData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:data {data} {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'save input data format json in db';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $data = $this->argument('data');
        $token = $this->argument('token');

        $user = User::where('acess_token', $token)->first();

        if ($user) {
            $userID = $user['id'];
            Data::create([
                'user_id' => $userID,
                'data' => $data,
            ]);
            return;
        }
        $this->error('Incorrect acess token');
    }
}
