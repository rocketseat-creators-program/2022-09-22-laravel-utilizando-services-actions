<?php

namespace App\Actions;

use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class ToggleActiveAction
{
    public function execute($id)
    {
        \Log::info('Action execute');
        // A Action chama um ou mais Services
        // e também pode chamar outra Action
        (new UserService)->toggleActive($id);

        return (new UserSendModifyEmailAction)->execute($id);
    }
}
