<?php

namespace App\Http\View\Composers;


use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SettingsComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('settings', DB::table('settings')->first());
    }
}
