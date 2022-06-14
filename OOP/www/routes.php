<?php
    return [
        '~^hello/(.*)$~' => [MyProject\Controllers\MainController::class, 'sayHello'],
        '~^bye/(.*)$~' => [MyProject\Controllers\MainController::class, 'sayBye'],
        '~^$~' => [MyProject\Controllers\MainController::class, 'main'],
        '~^article/(\d)/edit~' => [MyProject\Controllers\ArticleController::class, 'edit'],
        '~^article/add~' => [MyProject\Controllers\ArticleController::class, 'add'],
        '~^article/(\d)/delete~' => [MyProject\Controllers\ArticleController::class, 'delete'],
        '~^article/(\d)~' => [MyProject\Controllers\ArticleController::class, 'view'],
    ]
?>