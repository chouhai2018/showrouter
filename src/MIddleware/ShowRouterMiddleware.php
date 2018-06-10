<?php

namespace Chouhai2018\ShowRouter\Middleware;

use Closure;
use Chouhai2018\ShowRouter\DataCollectors\ApiCallsCountCollector;
use Chouhai2018\ShowRouter\DataCollectors\DataCollectorInterface;

class RoutesExplorerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        /** @var DataCollectorInterface[] $collectorInstance */
        $collectors = [];

        if (config('chouhai2018.showrouter.collections.api_calls_count')) {
            $collectors[] = app(ApiCallsCountCollector::class);
        }

        foreach ($collectors as $collector) {
            $collector->collect($request);
        }

        return $response;
    }
}
