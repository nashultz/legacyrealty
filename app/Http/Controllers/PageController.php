<?php

namespace Legacy\Http\Controllers;

use Illuminate\Http\Request;

use Legacy\Http\Requests;
use Legacy\Http\Controllers\Controller;
use Legacy\Page;

class PageController extends Controller
{
    public function show(Page $page, array $parameters)
    {
        return view('page', compact('page'));
    }
}
