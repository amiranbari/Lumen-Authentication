<?php

namespace App\Jobs;

use App\Models\User;
use Carbon\Traits\Serialization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class UserLoginJob extends Job implements ShouldQueue
{

    use Queueable, Serialization;

    private string $username;
    private string $password;
    private User $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $username, string $password, User $user)
    {
        $this->username = $username;
        $this->password = $password;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->update([
            'lock'  =>  'ok'
        ]);
        Log::channel('LoginFail')->info("UserLoginJob Fail. User Credentials => username: {$this->username}, password => {$this->password}");
    }
}
