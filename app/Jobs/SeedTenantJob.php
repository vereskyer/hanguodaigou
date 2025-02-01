<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Models\Tenant;
use App\Models\User;

class SeedTenantJob implements ShouldQueue
{
    use Queueable;

    protected $tenant;

    /**
     * Create a new job instance.
     */
    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tenant->run(function () {
            $user = User::create([
                'name' => $this->tenant->name,
                'email' => $this->tenant->email,
                'password' => $this->tenant->password,
            ]);

            // 這個是安裝了 laravel-permission 以後給 user 設定角色的
            $user->assignRole('admin');

        });
    }
}
