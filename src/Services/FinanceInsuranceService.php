<?php

namespace Fatgeek\FinanceInsuranceApiSdk\Services;

use GuzzleHttp\Client;

class FinanceInsuranceService
{
    private Client $client;

    public function __construct(array $options = [])
    {
        $this->client = new Client([
                'base_uri' => config('finance-insurance.uri'),
                'headers' => config('finance-insurance.headers'),
                'verify' => app()->environment('production')
            ] + $options);
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}