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
        view()->composer(array('bomitems.createitem', 'bomitems.edit', 'sales.soitems.create', 'sales.soitems.edit'), function($view) {
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
        view()->composer(array('addr.citys.create', 'addr.citys.edit', 'addr.addrs.create', 'addr.addrs.edit'), function($view) {
            $view->with('provinceList', \App\Province::orderby('id', 'asc')->lists('name', 'id'));
        });
        
        // cityList
        view()->composer(array('addr.addrs.create', 'addr.addrs.edit'), function($view) {
            $view->with('cityList', \App\City::orderby('id', 'asc')->lists('name', 'id'));
        });
        
        // addrList
        view()->composer(array('contacts.create', 'contacts.edit', 'inventory.warehouses.create', 'inventory.warehouses.edit'), function($view) {
            $view->with('addrList', \App\Addr::orderby('id', 'asc')->lists('line1', 'id'));
        });
        
        // contactList
        view()->composer(array('custinfos.create', 'custinfos.edit', 'inventory.warehouses.create', 'inventory.warehouses.edit'), function($view) {
            $view->with('contactList', \App\Contact::orderby('id', 'asc')->lists('name', 'id'));
        });
        
        // deptList
        view()->composer(array('system.employees.create', 'system.employees.edit'), function($view) {
            $view->with('deptList', \App\System\Dept::orderby('id', 'asc')->lists('name', 'id'));
        });
        
        // imageList
        view()->composer(array('system.employees.create', 'system.employees.edit'), function($view) {
            $view->with('imageList', \App\System\Image::orderby('id', 'asc')->lists('name', 'id'));
        });
        
        // custinfoList
        view()->composer(array('sales.salesorders.create', 'sales.salesorders.edit'), function($view) {
            $view->with('custinfoList', \App\Custinfo::orderby('id', 'asc')->lists('name', 'id'));
        });
        
        // salesrepList
        view()->composer(array('sales.salesorders.create', 'sales.salesorders.edit'), function($view) {
            $view->with('salesrepList', \App\Sales\Salesrep::orderby('id', 'asc')->lists('name', 'id'));
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
