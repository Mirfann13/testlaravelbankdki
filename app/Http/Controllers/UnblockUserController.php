<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UnblockUserController extends Controller
{
    public function index()
    {
        $blockedUsers = User::where('is_blocked', true)->get();
        return view('unblock.index', compact('blockedUsers'));
    }

    public function unblock(User $user)
    {
        $user->is_blocked = false;
        $user->login_attempts = 0;
        $user->save();

        return redirect()->route('unblock.index')->with('success', 'User berhasil dibuka blokirnya.');
    }
}