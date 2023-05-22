<?php

namespace App\Providers;

use Fortify\Contracts\AuthProvider;
use Illuminate\Http\Request;
use LdapRecord\Laravel\Auth\BindException;
use LdapRecord\Laravel\Auth\ListensForLdapBindFailure;
use LdapRecord\Models\ActiveDirectory\User as AdUser;
use LdapRecord\Models\ModelNotFoundException;

class LdapAuthServiceProvide implements AuthProvider, ListensForLdapBindFailure
{
    public function validate(Request $request): void
    {
        $credentials = $request->only(['email', 'password']);

        $user = AdUser::query()
            ->where('mail', '=', $credentials['email'])
            ->first();

        if (!$user) {
            throw new ModelNotFoundException();
        }

        try {
            $user->getConnection()->bind($user->getDn(), $credentials['password']);
        } catch (BindException $e) {
            throw new InvalidCredentialsException($e->getMessage());
        }
    }

    public function handleLdapBindFailure(Request $request, BindException $e): void
    {
        throw new InvalidCredentialsException($e->getMessage());
    }
}
