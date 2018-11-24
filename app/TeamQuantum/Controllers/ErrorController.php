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
 *                            Created @ 2018-11-03 - 00:21 PM
 */

namespace TeamQuantum\Controllers;

use TeamQuantum\Http\Request;
use TeamQuantum\Http\Response;

class ErrorController extends Controller
{
    public function show(Request $request, Response &$response)
    {
        $response->response($this->view(
            '404',
            $this->combineParamArrays([
                'code' => 404,
                'message' => 'The content you are looking for was not found on this page.'
            ], $request->params())
        ));
    }
}
