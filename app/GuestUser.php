<?php

namespace App;

class GuestUser extends User {

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isGuest()
    {
        return true;
    }

}
