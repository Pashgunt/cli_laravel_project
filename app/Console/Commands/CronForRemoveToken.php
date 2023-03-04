<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CronForRemoveToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:validate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'validate tokens for auth';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $date = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . '-5 minutes'));
        User::where([['token_created_at', '<=', $date]])->update(['acess_token' => '']);
    }
}
