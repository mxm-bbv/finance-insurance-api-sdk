<?php

namespace Fatgeek\FinanceInsuranceApiSdk\Objects\Requests;

abstract class AbstractRequest
{
    protected string $path;
    protected string $responseClass;
    protected string $method = 'POST';

    public function toArray(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getResponseClass(): string
    {
        return $this->responseClass;
    }
}