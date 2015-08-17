<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // itemList
        view()->composer(array('bomitems.createitem', 'bomitems.edit'), function($view) {
            $view->with('itemList', \App\Item::orderby('id', 'asc')->lists('item_number', 'id'));
        });
        
        // itemclassList
        view()->composer(array('items.create', 'items.edit'), function($view) {
            $view->with('itemclassList', \App\ItemClass::orderby('id', 'asc')->lists('name', 'id'));
        });
        
        // itemtypeList
        view()->composer(array('items.create', 'items.edit'), function($view) {
            $view->with('itemtypeList', \App\Itemtype::orderby('id', 'asc')->lists('name', 'id'));
        });
        
        // provinceList
        view()->composer(array('addr.citys.create', 'addr.citys.edit'), function($view) {
            $view->with('provinceList', \App\Province::orderby('id', 'asc')->lists('name', 'id'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
