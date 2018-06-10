<?php

namespace Chouhai2018\ShowRouter\DataCollectors;

use Illuminate\Http\Request;
use Chouhai2018\ShowRouter\Models\ApiCallsCount;

class ApiCallsCountCollector implements DataCollectorInterface
{
    public function collect(Request $request)
    {
        $apiCall = new ApiCallsCount([
            'url' => $request->route()->uri()
        ]);

        $apiCall->user_id = (\Auth::guest()) ? null : \Auth::id();
        $apiCall->save();
    }
}