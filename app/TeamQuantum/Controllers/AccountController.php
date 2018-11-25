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

use Psr\Log\LogLevel;
use TeamQuantum\Exceptions\DeserializationException;
use TeamQuantum\Helpers\Bcrypt;
use TeamQuantum\Helpers\Json;
use TeamQuantum\Http\Request;
use TeamQuantum\Http\Response;
use TeamQuantum\Logging\Logger;
use TeamQuantum\Session;

class AccountController extends Controller
{
    public function loginAction(Request $request, Response &$response)
    {
        // TODO: proper way to handle and display errors
        $notifications = [];

        if ($request->method() === 'POST' && $request->body('auth') === 'login') {
            // try to login
            $userName = $request->body('username');
            $password = $request->body('password');

            try {
                $user = Json::load($userName);

                if ($user !== null) {
                    // user found, check login data
                    if (($user['username'] === $userName || $user['email'] === $userName)
                        && Bcrypt::check($user, $password)) {

                        // log in
                        Session::set('username', $user['username']);
                        Session::set('email', $user['email']);
                        Session::set('rank', $user['rank']);
                        Session::set('logged_in', true);

                        array_push($notifications, ['type' => 'success', 'message' => 'You successfully logged in and will be redirected in 5 seconds.']);

                        $response->forward('/');
                    } else {
                        // wrong credentials
                        array_push($notifications, ['type' => 'error', 'message' => 'There is no user account with these credentials']);
                    }
                } else {
                    // there is no user with this name
                    array_push($notifications, ['type' => 'error', 'message' => 'We did not find any user with this name.']);
                }
            } catch (DeserializationException $e) {
                Logger::get()->log(LogLevel::CRITICAL, 'Failed deserialization on user file: ' . $userName);
                Logger::get()->log(LogLevel::INFO, '[' . $e->getCode() . '] ' . $e->getMessage());

                array_push($notifications, ['type' => 'error', 'message' => 'Server error occurred. Please notify your administrator!']);
            }
        }

        // show login
        $response->response($this->view('login', $this->combineParamArrays(['notifications' => $notifications], $request->params())));
    }

    public function logoutAction(Request $request, Response &$response)
    {
        Session::destroy();
        $response->response($this->view('logout', $this->combineParamArrays([], $request->params())))
            ->forward('/account/login');
    }
}
