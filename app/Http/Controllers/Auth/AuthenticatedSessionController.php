<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        if (! $request->validLogin()) {
            return redirect()
                ->route('login')
                ->withErrors(['error' => 'Login details do not match a user'])
            ;
        }

        $user = $request->getUser();

        return redirect()->route('login.success');
    }
}
