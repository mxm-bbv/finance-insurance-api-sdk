<?php

use Fatgeek\FinanceInsuranceApiSdk\Services\FinanceInsuranceService;

require_once '../vendor/autoload.php';

$service = new FinanceInsuranceService();
dd($service->getClient());