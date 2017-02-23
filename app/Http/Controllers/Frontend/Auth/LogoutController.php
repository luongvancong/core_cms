<?php

namespace Nht\Http\Controllers\Frontend\Auth;

use Nht\Http\Controllers\Controller;

class LogoutController extends Controller {

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}