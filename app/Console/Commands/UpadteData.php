<?php

namespace App\Console\Commands;

use App\Models\Data;
use Illuminate\Console\Command;
use App\Models\User;

class UpadteData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:data {id} {code} {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = $this->argument('id');
        $code = $this->argument('code');
        $token = $this->argument('token');

        $user = User::where('acess_token', $token)->first();

        if ($user) {
            $userID = $user['id'];
            $dataRow = Data::where([
                ['id', '=', $id],
                ['user_id', '=', $userID]
            ])->first();

            if (!$dataRow) {
                $this->error('You don`t have perisions for edit this row');
                return;
            }

            $data = $dataRow['data'];
        }

        $this->error('Incorrect acess token');
    }
}
