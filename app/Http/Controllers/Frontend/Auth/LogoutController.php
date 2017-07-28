<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller {

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}