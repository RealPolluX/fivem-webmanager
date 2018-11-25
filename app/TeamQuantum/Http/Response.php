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
 *                            Created @ 2018-11-02 - 21:05
 */

namespace TeamQuantum\Http;

class Response
{
    private $_statusCode;
    private $_contentType;
    private $_response;

    public function __construct()
    {
        $this->_statusCode = 200;
        $this->_contentType = 'text/html';
        $this->_response = '';
    }

    public function redirect(string $target): void
    {
        header('Location: ' . $target);
        die();
    }

    public function forward(string $location, int $wait = 5): Response
    {
        header('refresh:' . $wait . ';url=' . $location);
        return $this;
    }

    public function contentType(string $contentType): Response
    {
        $this->_contentType = $contentType;
        return $this;
    }

    public function response(string $response): Response
    {
        $this->_response = $response;
        return $this;
    }

    public function status(int $statusCode): Response
    {
        $this->_statusCode = $statusCode;
        return $this;
    }

    public function json(array $json): Response
    {
        $this->_response = json_encode($json);
        $this->_contentType = 'application/json';
        return $this;
    }

    public function dump(): array
    {
        return [
            'statusCode' => $this->_statusCode,
            'contentType' => $this->_contentType,
            'response' => $this->_response
        ];
    }
}
