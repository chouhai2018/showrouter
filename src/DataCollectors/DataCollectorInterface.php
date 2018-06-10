<?php

namespace Chouhai2018\ShowRouter\DataCollectors;

use Illuminate\Http\Request;

interface DataCollectorInterface
{
    public function collect(Request $request);
}