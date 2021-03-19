<?php

namespace App\Policies;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriberPolicy
{
    use HandlesAuthorization;

    public function subscriber(Subscriber $subscriber, $hash)
    {
        return $hash === $subscriber->hash;
    }


}
