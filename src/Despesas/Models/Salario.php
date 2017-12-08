<?php

namespace Manzoli2122\Salao\Despesas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Config;

class Salario extends Model
{
    public function newInstance($attributes = [], $exists = false)
    {
        $model = parent::newInstance($attributes, $exists);    
        $model->setTable($this->getTable());    
        return $model;
    }

    public function getTable()
    {
        return  Config::get('despesas.despesas_table' , 'despesas') ;
    }

    
    protected $fillable = [
            'tipo', 'valor', 
    ];



    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('salario', function (Builder $builder) {
            $builder->where( 'tipo', 'salario' );
        });
    }


    public function funcionario()
    {
        return $this->belongsTo('Manzoli2122\Salao\Despesas\Models\Funcioanario', 'funcionario_id');
    }


    public function servicos()
    {        
        return $this->hasMany('Manzoli2122\Salao\Atendimento\Models\AtendimentoFuncionario', 'salario_id');
    }




}
