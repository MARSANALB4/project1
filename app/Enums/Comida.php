<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Comida extends Enum
{
    const Desayuno =   0;
    const MediaMañana =   1;
    const Almuerzo = 2;
    const Merienda = 3;
    const Cena = 4;

}
