<?php

namespace App\Enums;

class UserRole
{
    const ADMIN = 'admin';
    const USER = 'user';
    const BANNED = 'banned';

    const TYPES = [
        self::ADMIN,
        self::USER,
        self::BANNED
    ];
}
?>
