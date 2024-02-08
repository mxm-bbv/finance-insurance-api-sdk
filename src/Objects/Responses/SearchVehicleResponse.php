<?php

namespace Fatgeek\FinanceInsuranceApiSdk\Objects\Responses;

/**
 * @property string $carname
 * @property string $category
 * @property bool $available
 */
class SearchVehicleResponse extends AbstractApiResponse
{
    public function getCarName(): string
    {
        return $this->carname;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }
}