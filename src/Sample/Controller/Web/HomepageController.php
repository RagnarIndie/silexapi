<?php
namespace Sample\Controller\Web;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomepageController
{
    public function index(Request $request, Application $app)
    {
        $routes = [
            'routes' => [],
        ];

        foreach ($app['routes'] as $route) {
            $tmp = [
                'method' => $route->getMethods()[0],
                'path' => $route->getPath()
            ];

            array_push($routes['routes'], $tmp);
        }

        return $app->json($routes);
    }
}