<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * 循环查询出顶级分类里的子类 输出到公用模板
     * @return void
     */
    public function boot()
    {
        view()->composer('web.public.nav', function ($view) {
             $dataObj = \DB::table('data_types')->where('pid', '0')->get();
                foreach($dataObj as $data){
                    $data->children = \DB::table('data_types')->where('pid', $data->id)->get();
                    foreach($data->children as $children){
                        $children->grandchild = \DB::table('data_types')->where('pid', $children->id)->get();
                    }
                }
            $view->with('data',$dataObj);
        });

        view()->composer('web.public.footer', function ($view) {
            $friend = \DB::table('data_friend_link')->where('status', 0)->get();
            $view->with(compact('friend'));
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
