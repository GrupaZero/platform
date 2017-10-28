<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Gzero\Base\Models\User as BaseUser;

class User extends BaseUser
{
    use Notifiable;
}
