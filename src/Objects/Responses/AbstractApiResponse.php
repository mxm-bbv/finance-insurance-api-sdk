<?php

namespace Fatgeek\FinanceInsuranceApiSdk\Objects\Responses;

use Illuminate\Support\Str;

/**
 * @property boolean|null $success
 * @property string|null $error
 */
abstract class AbstractApiResponse
{
    public function __construct(private readonly mixed $response)
    {
        collect($this->response)
            ->each(function ($value, $key) {
                $key = Str::camel($key);
                $this->{$key} = $value;
            });
    }

    public function __get(string $name)
    {
        if (!property_exists($this, $name)) {
            return null;
        }

        return $this->{$name};
    }

    /**
     * @return mixed
     */
    public function getResponse(): mixed
    {
        return $this->response;
    }

    public function __debugInfo(): ?array
    {
        return [
            'success' => $this->success
        ];
    }
}