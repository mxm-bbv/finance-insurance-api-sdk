<?php

namespace Fatgeek\FinanceInsuranceApiSdk\Services;

use Fatgeek\FinanceInsuranceApiSdk\Objects\Requests\AbstractRequest;
use Fatgeek\FinanceInsuranceApiSdk\Objects\Responses\AbstractApiResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;

class FinanceInsuranceService
{
    private Client $client;

    public function __construct(array $options = [])
    {
        $this->client = new Client([
                'base_uri' => config('finance-insurance.uri'),
                'headers' => config('finance-insurance.headers') + [
                        'content-type' => 'application/json',
                        'accept' => 'application/json'
                    ],
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

    /**
     * @param AbstractRequest $request
     * @return AbstractApiResponse
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function send(AbstractRequest $request): AbstractApiResponse
    {
        return resolve($request->getResponseClass(), [
                'response' => $this->processResponse(
                    $this->client->request(
                        $request->getMethod(),
                        $request->getPath(),
                        match (Str::lower($request->getMethod())) {
                            'post' => [
                                'json' => $request->toArray()
                            ]
                        }
                    )
                )
            ]
        );
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     * @throws \JsonException
     */
    private function processResponse(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true, flags: JSON_THROW_ON_ERROR);
    }
}