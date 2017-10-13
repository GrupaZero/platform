<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Gzero\Base\Model\User as BaseUser;

class User extends BaseUser
{
    use Notifiable;
}
