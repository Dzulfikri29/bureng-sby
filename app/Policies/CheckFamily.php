<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class CheckFamily
{
    use HandlesAuthorization;

    public function view($user, $family_id)
    {
        if ($user->family_id) {
            return $user->family_id == $family_id;
        }
        return true;
    }
}
