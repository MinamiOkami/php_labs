<?php
    spl_autoload_register(function (string $className){
        require_once __DIR__.'/../src/'.str_replace('\\', '/', $className).'.php';
    });

    $route = $_GET['route'] ?? '';
    $routes = require __DIR__.'/routes.php';
    $isRouteFound = false;
    foreach($routes as $pattern => $controllerAndAction){
        preg_match($pattern, $route, $matches);
        if (!empty($matches)){
           $isRouteFound = true;
            break;
        }
    }
    if (!$isRouteFound) {
         echo 'Страница не найдена';
         return;        
    }
    unset($matches[0]);
    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];
    $controller = new $controllerName();
    $controller->$actionName(...$matches);

    // require '../src/MyProject/Models/Users/user.php';
    // require '../src/MyProject/Models/Articles/article.php';
    // $author = new MyProject\Models\Users\User('Sasha');
    // $article = new MyProject\Models\Articles\Article('Title', 'Text', $author);
    // var_dump($article);
?>