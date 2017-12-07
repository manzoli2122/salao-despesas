<?php

namespace Manzoli2122\Salao\Despesas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adiantamento extends Model
{

    use SoftDeletes;
    
    public function __construct(){
        $this->table = Config::get('despesas.despesas_table' , 'despesas') ;    
    }
    

    protected $fillable = [
            'tipo', 'valor',  'descricao' , 'funcionario_id' , 
    ];


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('adiantamento', function (Builder $builder) {
            $builder->where( 'tipo', 'adiantamento' );
        });
    }




    public function funcionario()
    {
        return $this->belongsTo('Manzoli2122\Salao\Despesas\Models\Funcioanario', 'funcionario_id');
    }


    public function salario()
    {        
        return $this->belongsTo('Manzoli2122\Salao\Despesas\Models\Salario', 'salario_id');
    }


    public function AdiantamentosSemSalario($funcionarioId)
    {
        return $this->whereNull('salario_id')->where('funcionario_id' , $funcionarioId)->orderBy('created_at', 'asc')->get();
    }


}
