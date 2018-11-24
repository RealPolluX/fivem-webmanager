<?php

namespace TeamQuantum\Http;

class Request
{
    private $_environment;
    private $_params;
    private $_query;
    private $_body;

    public function __construct(array $environment, array $params, array $query, array $body)
    {
        $this->_environment = $environment;
        $this->_params = $params;
        $this->_query = $query;
        $this->_body = $body;
    }

    public function method(): string
    {
        if (!array_key_exists('REQUEST_METHOD', $this->_environment)) {
            return null;
        }

        return $this->_environment['REQUEST_METHOD'];
    }
    
    public function contentType(): string
    {
        if (!array_key_exists('CONTENT_TYPE', $this->_environment)) {
            return null;
        }

        return $this->_environment['CONTENT_TYPE'];
    }

    public function params(): ?array
    {
        return $this->_params;
    }

    public function query(string $key): ?string
    {
        if (!array_key_exists($key, $this->_query)) {
            return null;
        }

        return $this->_query[$key];
    }

    public function body(string $key): ?string
    {
        if (!array_key_exists($key, $this->_body)) {
            return null;
        }

        return $this->_body[$key];
    }
}
