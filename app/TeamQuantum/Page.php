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
 *                            Created @ 2018-11-02 - 00:42
 */

namespace TeamQuantum;

use TeamQuantum\Controllers\ErrorController;
use TeamQuantum\Http\Request;
use TeamQuantum\Http\Response;

class Page
{
    public function execute(string $uri): string
    {
        $route = Router::resolve($uri);
        if ($route === null) {
            $errorPage = new ErrorController();

            return $errorPage->show($route['params'] === null ? [] : $route['params']);
        }

        $controller = new $route['controller'];
        $method = $route['method'];

        $request = new Request($_SERVER, $route['params'], $_GET, $_POST);
        $response = new Response();
        $controller->$method($request, $response);

        $dump = $response->dump();
        header('X-PHP-Response-Code: ' . $dump['statusCode'], true, $dump['statusCode']);
        header('Content-Type: ' . $dump['contentType']);
        return $dump['response'];
    }
}
