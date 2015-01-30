<?php

namespace GrowChart\Common;

/**
 * The definition of the ethnicity.
 *
 * @author congpeijun <p.cong@linkorb.com>
 */
class Ethnicity
{
    private static $ethnicity = array(
        'Dutch',
        'Dutched mixed',
        'Moroccan',
        'Ghanaian',
        'Surinamese-Hindustani',
        'Surinamese-Creole',
        'Surinamese-Other'
    );

    public static function getEthnicity()
    {
        return self::$ethnicity;
    }
}
