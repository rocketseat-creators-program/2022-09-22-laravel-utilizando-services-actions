<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAllPaginated()
    {
        return User::paginated(25);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function toggleActive($id)
    {
        \Log::info('User Service toggleActive');
        $user = User::findOrFail($id);
        $user->active = !$user->active;
        return $user->save();
    }
}
