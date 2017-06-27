<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('web.public.nav', function ($view) {
             $dataObj = \DB::table('data_types')->where('path', '0,')->get();
                foreach($dataObj as $data){
                    $data->children = \DB::table('data_types')->where('pid', $data->id)->get();
                    foreach($data->children as $children){
                        $children->grandchild = \DB::table('data_types')->where('pid', $children->id)->get();
                    }
                }
            $view->with('data',$dataObj);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
