<?php

namespace Legacy\View\Composers;

use Illuminate\View\View;
use Legacy\Page;

class InjectPages
{
    protected $pages;

    public function __construct(Page $pages)
    {
        $this->pages = $pages;
    }

    public function compose(View $view)
    {
        $pages = $this->pages->all()->toHierarchy();

        $view->with('pages', $pages);
    }
}