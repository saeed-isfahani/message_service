<?php

return [
    'services' => array(
        'auth_service' => array(
            'url' => env('AUTH_SERVICE_URL', 'http://127.0.0.1:8000/api/v1/check-token')
        )
    )
];
