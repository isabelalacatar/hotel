<?php

namespace App\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FlashComposer
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Create a new profile composer.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $flash = [];
        if ($this->request->session()->has('flash.message.first')) {
            $flash[] = $this->request->session()->get('flash.message.first');
        }
        if ($this->request->session()->has('flash.message.second')) {
            $flash[] = $this->request->session()->get('flash.message.second');
        }
        if ($this->request->session()->has('flash.message.third')) {
            $flash[] = $this->request->session()->get('flash.message.third');
        }
        $view->with('flash', $flash);
    }
}
