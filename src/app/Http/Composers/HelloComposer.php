<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer
{
    public function compose(View $view)
    {
        $view->with('composerMessage', "This view is `{$view->getName()}`!!");
    }
}
