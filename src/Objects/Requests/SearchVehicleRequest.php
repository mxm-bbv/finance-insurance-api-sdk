<?php

namespace Fatgeek\FinanceInsuranceApiSdk\Objects\Requests;

use Fatgeek\FinanceInsuranceApiSdk\Objects\Responses\SearchVehicleResponse;

class SearchVehicleRequest extends AbstractRequest
{
    protected string $path = 'policy/searchvehicle';
    protected string $responseClass = SearchVehicleResponse::class;
    private ?string $carNumber;

    public function getCarNumber(): ?string
    {
        return $this->carNumber;
    }

    public function setCarNumber(?string $carNumber): void
    {
        $this->carNumber = $carNumber;
    }

    public function toArray(): array
    {
        return [
            'carnumber' => $this->getCarNumber()
        ];
    }
}