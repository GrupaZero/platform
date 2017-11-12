<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Gzero\Core\Models\User as BaseUser;

class User extends BaseUser
{
    use Notifiable;
}
