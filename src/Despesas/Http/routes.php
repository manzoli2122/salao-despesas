<?php
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'gastos', 'middleware' => 'auth' ], function(){


        Route::get('despesas/apagados/{id}', 'DespesaController@showApagado')->name('despesas.showapagado');        
        Route::get('despesas/apagados', 'DespesaController@indexApagados')->name('despesas.apagados');
        Route::delete('despesas/destroySoft/{id}', 'DespesaController@destroySoft')->name('despesas.destroySoft');
        Route::get('despesas/restore/{id}', 'DespesaController@restore')->name('despesas.restore');
        Route::resource('despesas', 'DespesaController'  ); 

        Route::post('funcionario/{id}/salarios/cadastrar', 'FuncionarioController@storeSalario')->name('salario.store');
        
        Route::get('funcionarios', 'FuncionarioController@index')->name('funcionarios.index');
        Route::post('funcionarios/{id}/adiantamentos/cadastrar', 'FuncionarioController@storeAdiantamento')->name('adiantamento.store');
        Route::get('funcionarios/{id}', 'FuncionarioController@show')->name('funcionarios.show');
        
        Route::get('/', 'GastoController@index')->name('gastos');

    });