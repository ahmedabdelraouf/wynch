<?php

namespace Dev\Application\Utility;

/**
 * Class UserGender
 * @package Dev\Application\Utility
 */
class UserGender
{
    /**
     *
     */
    const MALE = 'male';

    /**
     *
     */
    const FEMALE = 'female';

    /**
     *
     */
    const MALE_LABEL = 'Male';

    /**
     *
     */
    const FEMALE_LABEL = 'Female';

    /**
     *
     */
    public static function genderTypesArr() : array
    {
        return [
            self::MALE,
            self::FEMALE
        ];
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public static function convertKeyToName(string $key)
    {
        $types = [
            self::MALE => self::MALE_LABEL,
            self::FEMALE => self::FEMALE_LABEL
        ];
        return isset($types[$key]) ? $types[$key] : null;
    }
}