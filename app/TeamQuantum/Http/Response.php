<?php

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

    public function redirect(string $target)
    {
        header('Location: ' . $target);
        die();
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
