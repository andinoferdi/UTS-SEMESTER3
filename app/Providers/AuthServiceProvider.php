<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

// Import Model dan Policy Anda
use App\Models\Pesan;
use App\Policies\PesanPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Mapping Model ke Policy
        Pesan::class => PesanPolicy::class,
        // Tambahkan mapping lainnya jika diperlukan
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Anda dapat mendefinisikan Gate tambahan di sini jika diperlukan
    }
}
