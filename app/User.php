<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Gzero\Entity\User as BaseUser;

class User extends BaseUser {
    use Notifiable;
}
