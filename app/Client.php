<?php

namespace App;

use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model implements QueueableEntity
{
    use Notifiable;
    protected $guarded = [];

}
