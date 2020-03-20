<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller {

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}