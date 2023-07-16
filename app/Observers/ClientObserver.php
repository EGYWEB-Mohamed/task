<?php

namespace App\Observers;

use App\Client;
use App\Jobs\SendWelcomeEmailJob;
use App\Notifications\WelcomeNotification;

class ClientObserver
{
    public function created(Client $client): void
    {
        SendWelcomeEmailJob::dispatch($client);
//        $client->notify(new WelcomeNotification());
    }

    public function updated(Client $client): void
    {
    }

    public function deleted(Client $client): void
    {
    }

    public function restored(Client $client): void
    {
    }

    public function forceDeleted(Client $client): void
    {
    }
}
