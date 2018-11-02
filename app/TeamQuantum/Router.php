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
 *                            Created @ 2018-11-02 - 18:34 PM
 */

namespace TeamQuantum;


class Router
{
    /**
     * @param string $uri
     * @return null|array
     */
    public static function resolve(string $uri): ?Array
    {

        $var = parse_url($uri);
        $path = explode('/', trim($var['path'], "/"));

        // MVC pattern: <controller> / <method>
        if (empty($path[0]) && count($path) === 1) {
            $path[0] = 'index';
        }

        if (count($path) === 1) {
            array_push($path, 'index');
        }

        $className = 'TeamQuantum\\Controllers\\' . ucfirst($path[0] . 'Controller');
        if (!class_exists($className)) {
            return null;
        }

        $methodName = $path[1] . 'Action';
        if (!method_exists(new $className, $methodName)) {
            return null;
        }

        // remove class and method from array
        array_shift($path);
        array_shift($path);

        return [
            'controller' => $className,
            'method' => $methodName,
            'params' => $path
        ];
    }
}