<?php

namespace DigitCert\Resources;

use DigitCert\Client;
use DigitCert\Requests\AbstractRequest;

abstract class AbstractResource
{
    protected $version = 'v1';
    protected $prefix = 'api';

    /**
     * @var Client
     */
    protected $client = null;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function buildApiPath(string $path)
    {
        $s = '%s/%s/%s';
        return sprintf($s, $this->prefix, $this->version, ltrim($path, '/'));
    }

    public function callApi($path, AbstractRequest $request, $method = 'get')
    {
        return $this->client->{$method}($this->buildApiPath($path), $request->toArray());
    }
}
