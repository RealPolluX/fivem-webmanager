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
 *                            Created @ 2018-11-02 - 18:01 PM
 */

namespace TeamQuantum\Logging;

use Katzgrau\KLogger;


/**
 * Class Logger
 * - static wrapper for the real Logger class
 *
 * @package TeamQuantum\Logging
 */
class Logger
{
    public static $_instance;

    public static function instance()
    {
        return self::get();
    }

    public function __construct()
    {
        self::$_instance = $this;
    }

    public static function get()
    {
        if (self::$_instance === null) {
            self::$_instance = new KLogger\Logger(__DIR__ . '/../../../storage/logs');
        }

        return self::$_instance;
    }
}