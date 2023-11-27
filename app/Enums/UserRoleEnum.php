<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

/**
 * @method static static TUTOR()
 * @method static static STUDENT()
 */
final class UserRoleEnum extends Enum
{
    const ADMINROLEID = 1;
    const ADMIN = 'Admin';
    const INSTITUTE = 'Institute';
}
