<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use App\Providers\FortifyServiceProvider as Fortify;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();

        // Auth::viaRequest('ldap', function (Request $request) {
        //     return User::where('token', $request->token)->first();
        // });

        // Fortify::authenticateUsing(function ($request) {
        //     $validated = Auth::validate([
        //         'samaccountname' => $request->username,
        //         'password' => $request->password
        //     ]);

        //     return $validated ? Auth::getLastAttempted() : null;
        // });
        
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
    
            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
        });
    }
}
