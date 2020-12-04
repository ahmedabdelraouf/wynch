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
    const ADMIN = 'admin';

    /**
     *
     */
    const USER_LABEL = 'User';

    /**
     *
     */
    const ADMIN_LABEL = 'Admin';

    /**
     *
     */
    public static function userTypesArr(): array
    {
        return [
            self::USER,
            self::ADMIN
        ];
    }

    public static function explodedTypes()
    {
        return self::USER . ',' . self::ADMIN;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public static function convertKeyToName(string $key)
    {
        $types = [
            self::USER => self::USER_LABEL,
            self::ADMIN => self::ADMIN_LABEL
        ];
        return isset($types[$key]) ? $types[$key] : null;
    }
}
