<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function adminDashboard() {
        return view('backend.admin.dashboard');
    }
    public function userDashboard() {
        return view('backend.user.dashboard');
    }
}
