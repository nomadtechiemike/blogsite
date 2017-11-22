<?php

namespace Theme\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Theme;

class BlogController extends Controller
{

    /**
     * @return \Response
     */
    public function test()
    {
        return Theme::scope('test')->render();
    }
}