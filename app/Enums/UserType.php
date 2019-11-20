<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static admin()
 * @method static static user()
 * @method static static arena()
 * @method static static superadmin()

 */
final class UserType extends Enum
{
    const admin =   0;
    const user =   1;
    const arena = 2;
    const superadmin = 3;
}
