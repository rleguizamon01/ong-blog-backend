<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Auth\Access\HandlesAuthorization;

class VolunteerPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role == 'client' || $user->role == 'admin';
    }

    public function view(User $user, Volunteer $volunteer)
    {
        return $user->role == 'client' || $user->role == 'admin';
    }

    public function create(?User $user)
    {
        return true;
    }

    public function update(User $user, Volunteer $volunteer)
    {
        return $user->role == 'admin';
    }

    public function delete(User $user, Volunteer $volunteer)
    {
        return $user->role == 'admin';
    }
}
