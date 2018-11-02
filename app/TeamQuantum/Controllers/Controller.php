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
 *                            Created @ 2018-11-02 - 18:35 PM
 */

namespace TeamQuantum\Controllers;

use League\Plates\Engine;

class Controller
{
    /**
     * Renders the appropriate template specified by the URI.
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    protected function view(string $view, array $params = []): string
    {
        $templateEngine = new Engine(__DIR__ . '/../../../resources/views', 'view.php');
        return $templateEngine->render($view, $params);
    }

    /**
     * Combines all URI parameters and the custom ones used in your template.
     *
     * @param array $customParams
     * @param array $uriParams
     * @return array
     */
    protected function combineParamArrays(array $customParams, array $uriParams = [])
    {
        return array_merge($customParams, $uriParams);
    }

}