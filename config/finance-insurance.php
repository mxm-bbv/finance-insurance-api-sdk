<?php

return [
    'uri' => env('FREEDOM_INSURANCE_API_URI', 'https://apiv4.sandbox.kz'),

    'headers' => json_decode(env('FREEDOM_INSURANCE_HEADERS', '{}')),
];