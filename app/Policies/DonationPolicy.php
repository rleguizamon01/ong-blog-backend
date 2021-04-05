<?php

namespace App\Policies;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DonationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    public function view(User $user, Donation $donation)
    {
        return $user->isAdmin();
    }

    public function create(?User $user)
    {
        return true;
    }

    public function update(User $user, Donation $donation)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Donation $donation)
    {
        return $user->isAdmin();
    }
}
