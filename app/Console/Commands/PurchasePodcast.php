<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class PurchasePodcast extends Command
{

    protected $signature = 'user:auth {login : login for user} {password : password for user}';

    protected $description = 'generate token for auth and use this in next requsts';

    public function __construct()
    {
        parent::__construct();
    }

    private function generateAcessTokenForUser(): string
    {
        return md5(time()) . rand(0, time());
    }

    public function handle(): void
    {
        $login = $this->argument('login');
        $password = $this->argument('password');

        $user = User::where([
            ['email', '=', $login],
        ])->first();

        if ($user) {
            $passwordUser = $user['password'];
            if (Hash::check($password, $passwordUser)) {
                $acessToken = $this->generateAcessTokenForUser();
                $userID = $user['id'];
                User::where('id', $userID)->update([
                    'acess_token' => $acessToken,
                    'token_created_at' => date("Y-m-d H:i:s")
                ]);
                $this->info("Your token is $acessToken");
                return;
            }
        }
        $this->error('User with login and password is underfind!');
    }
}
