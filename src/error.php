<?php

namespace app\src\error;

use app\core;

function httpNotFoundError($message = '') {
    return core\renderView(['errors/http_404.php'], [
        'message' => $message
    ]);
}

function internalServerError($message = '') {
    return core\renderView(['errors/http_500.php'], [
        'message' => $message
    ]);
}
