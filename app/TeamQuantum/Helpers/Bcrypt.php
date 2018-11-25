<?php
/**
 * Copyright © 2018
 * "fivem-webmanager" - Brought to you by:
 * ___________                    ________                       __
 * \__    ___/___ _____    _____  \_____  \  __ _______    _____/  |_ __ __  _____
 *   |    |_/ __ \\__  \  /     \  /  / \  \|  |  \__  \  /    \   __\  |  \/     \
 *   |    |\  ___/ / __ \|  Y Y  \/   \_/.  \  |  // __ \|   |  \  | |  |  /  Y Y  \
 *   |____| \___  >____  /__|_|  /\_____\ \_/____/(____  /___|  /__| |____/|__|_|  /
 *              \/     \/      \/        \__>          \/     \/                 \/
 *                          https://github.com/Team-Quantum
 *                      .PolluX / https://github.com/RealPolluX
 *                            Created @ 2018-11-25 - 09:46
 */

namespace TeamQuantum\Helpers;


class Bcrypt
{
    /**
     * Hash
     *
     * hash a password with salt, 10 rounds (default)
     *
     * @param string $password password to hash
     * @param string $salt
     *
     * @return string hash of password
     *
     * @access public
     * @static
     */
    public static function create(string $password, string $salt): string
    {
        return password_hash($password, PASSWORD_BCRYPT, ['salt' => $salt, 'cost' => 10]);
    }

    /**
     * Salt
     *
     * generate a random salt
     *
     * @return string generated salt
     *
     * @access private
     * @static
     */
    public static function generateSalt(): string
    {
        $ch = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./';
        $chlen = strlen($ch) - 1;
        $s = "";

        for ($i = 0; $i < 22; $i++) {
            $s .= $ch[mt_rand(0, $chlen)];
        }

        return $s;
    }

    /**
     * Check
     *
     * checks if the given password string matches the user data
     *
     * @param array $user
     * @param string $password
     *
     * @return bool result
     *
     * @access private
     * @static
     */
    public static function check(array $user, string $password): bool
    {
        return $user['password'] === self::create($password, $user['salt']);
    }
}