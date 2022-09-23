<?php

namespace App\Http\Controllers;

use App\Actions\ToggleActiveAction;
use Illuminate\Http\Request;

class UserToggleActiveController
{
    public function __invoke($id)
    {
        \Log::info('Action Controller');
        // Dentro de um Action Controller
        // você chama uma Action que pode chamar ou não um Service (ou até outra Action)
        (new ToggleActiveAction)->execute($id);

        return redirect()->route('users.index');
    }
}
