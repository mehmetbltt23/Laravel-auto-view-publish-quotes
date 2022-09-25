<?php

namespace Quotes\Examples;

class ExamplesController
{
    //route localhost/page1
    //loaded 'page1' => ['Quote1' => 'Quote2'],
    public function first()
    {
        view('example');
    }

    //route localhost/page2/232/products
    //loaded 'page2' => ['Quote2' => 'Quote3'],
    public function second()
    {
        view('example');
    }
}