<?php

namespace Chouhai2018\ShowRouter;

use Chouhai2018\ShowRouter\Models\ApiCallsCount;
use Route;

class ShowRouter
{
    public function getRoutes()
    {
        /** @var \Illuminate\Routing\Route[] $allRoutes */
        $allRoutes = Route::getRoutes()->getRoutes();

        /** @var \Illuminate\Routing\Route[] $allRoutes */
        $namedRoutes = Route::getRoutes()->getRoutesByName();

        $namedRoutesUri = [];
        foreach ($namedRoutes as $routeName => $route) {
            $namedRoutesUri[$route->uri] = $routeName;
        }

        $routes = [];
        foreach ($allRoutes as $route) {
            $routes[$route->uri] = [
                'name' => isset($namedRoutesUri[$route->uri]) ? $namedRoutesUri[$route->uri] : '',
                'url' => $route->uri,
                'controller' => $route->getActionName(),
                'action' => $route->getActionName(),
                'methods' => implode(", ", $route->methods()),
                'count' => 0
            ];
        }

        if (config('chouhai2018.showrouter.collections.api_calls_count')) {
            $apiCallCount = ApiCallsCount::groupBy('url')
                ->select('url', \DB::raw('count(*) as total'))
                ->get();

            foreach ($apiCallCount as $countObj) {
                $routes[$countObj->url]['count'] = $countObj->total;
            }
        }

        return $routes;
    }

    public function showRoutes()
    {
        $routes = $this->getRoutes();

        return view(config('chouhai2018.showrouter.view'))->with(['routes' => $routes]);
    }
}