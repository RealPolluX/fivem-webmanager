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
 *                            Created @ 2018-11-02 - 21:05 PM
 */

namespace TeamQuantum\Controllers;

use TeamQuantum\Exceptions\DeserializationException;
use TeamQuantum\Helpers\Json;
use TeamQuantum\Http\Request;
use TeamQuantum\Http\Response;
use TeamQuantum\Session;

class AccountController extends Controller
{
    public function loginAction(Request $request, Response &$response)
    {
        if ($request->method() === 'POST' && $request->body('auth') === 'login') {
            // try to login
            $userName = $request->body('username');
            $password = $request->body('password');

            $user = null;
            try {
                $user = Json::load($userName);
            } catch (DeserializationException $e){
                if ($user !== null) {
                    // user found, check login data
                    // TODO: password hashing
                    if (($user['username'] === $userName || $user['email'] === $userName) && $user['password'] === $password) {
                        // log in
                        Session::set('username', $user['username']);
                        Session::set('email', $user['email']);
                        Session::set('rank', $user['rank']);
                        Session::set('logged_in', true);
                    } else {
                        // wrong credentials
                    }

                } else {
                    // there is no user with this name
                    // TODO: proper way to handle and display errors
                }
            }
        }

        // show login
        $response->response($this->view('login', $this->combineParamArrays([], $request->params())));
    }

    public function logoutAction(Request $request, Response &$response)
    {
        // TODO: proper logout handling
        $response->response($this->view('logout', $this->combineParamArrays(['username' => 'TestName'], $request->params())));
    }
}
