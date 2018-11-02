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
        $this->registerGlobalFunctions($templateEngine);

        return $templateEngine->render($view, $params);
    }

    /**
     * Combines all URI parameters and the custom ones used in your template.
     *
     * @param array $customParams
     * @param array $uriParams
     *
     * @return array
     */
    protected function combineParamArrays(array $customParams, array $uriParams = [])
    {
        return array_merge($customParams, $uriParams);
    }

    /**
     * Autodetect base url
     *
     * @return mixed
     */
    public function detectBaseUrl()
    {
        if (isset($_SERVER['REQUEST_SCHEME'])) { // localhost bugfix
            $baseUrl = $_SERVER['REQUEST_SCHEME'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
            $baseUrl = $_SERVER['HTTP_X_FORWARDED_PROTO'];
        } else {
            $baseUrl = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
        }

        $baseUrl .= '://' . $_SERVER['HTTP_HOST'];
        $baseUrl .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $baseUrl;
    }

    /**
     * Registers common function which can be used inside all templates.
     *
     * @param Engine $templateEngine
     */
    private function registerGlobalFunctions(Engine $templateEngine): void
    {
        $templateEngine->registerFunction('url', function () {
            return $this->detectBaseUrl();
        });

        $templateEngine->registerFunction('year', function (){
            return date('Y');
        });
    }

}