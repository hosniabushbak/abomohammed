<?php

namespace App\Observers;

use App\Models\ClientEvent;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ClientEventActionObserver
{
    public function created(ClientEvent $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ClientEvent'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
