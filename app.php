<?php 

// Precargar controladores
$controllers = [];


// Definir las rutas del proyecto
$ROOT_URL = '/web/empleoconecta';       // Ruta raiz
$routes = [                             // Rutas de la pagina
    # Home
    $ROOT_URL.'/' => 'AppController@index',
    $ROOT_URL.'/hello' => 'AppController@helloworld',
    
];


// Obtener url, ruta
$url = parse_url($_SERVER['REQUEST_URI']);
$path = $url["path"];
$parameters = [];


// Parametros get
if( !empty($url["query"]) ){
    parse_str($url["query"], $parameters);
}


// Verificar ruta actual con nuestras rutas definidas
if (array_key_exists($path, $routes)) {
    $controllerAction = explode('@', $routes[$path]);

    $controllerName = $controllerAction[0];
    $actionName = $controllerAction[1];

    // Verificar si el controlador ya esta precargado
    $itsAlreadyController = array_key_exists($controllerName, $controllers);
    if( $itsAlreadyController ){   
        
        $object = $controllers[$controllerName];
        $$object->$actionName($parameters);

    }else{
        require_once "controllers/{$controllerName}.php";
        $controller = new $controllerName();
        $controller->$actionName($parameters); 
    }

// No hay coincidencias entre la ruta actual con las ya definidas    
} else {
    echo '404 Not Found';
}

?>