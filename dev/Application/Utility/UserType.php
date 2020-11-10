<?php


namespace Dev\Application\Utility;


class UserType
{
    /**
     *
     */
    const USER = 'user';

    /**
     *
     */
    const DRIVER = 'driver';

    /**
     *
     */
    const USER_LABEL = 'User';

    /**
     *
     */
    const DRIVER_LABEL = 'Driver';

    /**
     *
     */
    public static function userTypesArr(): array
    {
        return [
            self::USER,
            self::DRIVER
        ];
    }

    public static function explodedTypes()
    {
        return self::USER . ',' . self::DRIVER;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public static function convertKeyToName(string $key)
    {
        $types = [
            self::USER => self::USER_LABEL,
            self::DRIVER => self::DRIVER_LABEL
        ];
        return isset($types[$key]) ? $types[$key] : null;
    }
}
