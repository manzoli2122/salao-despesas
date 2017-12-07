<?php 

namespace Manzoli2122\Salao\Despesas;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DespesasServiceProvider extends ServiceProvider
{

 
    protected $defer = false;
    protected $namespace = 'Manzoli2122\Salao\Despesas\Http\Controllers'  ;
    
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../config/config.php' =>  config_path('despesas.php'), 
        ], 'despesas_config');
        $this->mapWebRoutes();     
        $this->loadViewsFrom(__DIR__.'/Views', 'despesa');
    }


    private function mapWebRoutes()
    {                
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(__DIR__.'/Http/routes.php');
    }



    public function register()
    {
       
        $this->mergeConfig();
    }


   

    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'despesas'
        );
    }

   



   
}

