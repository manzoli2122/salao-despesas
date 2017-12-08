<?php

namespace Manzoli2122\Salao\Despesas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Config;

class Despesa extends Model
{

    use SoftDeletes;

    public function newInstance($attributes = [], $exists = false)
    {
        $model = parent::newInstance($attributes, $exists);    
        $model->setTable($this->getTable());    
        return $model;
    }

    public function getTable()
    {
        return   Config::get('despesas.despesas_table' , 'despesas') ;
    }
    
    
    
    
    protected $fillable = [
            'tipo', 'valor', 'descricao' , 'categoria' ,
    ];



    public function funcionario()
    {
        return $this->belongsTo('Manzoli2122\Salao\Despesas\Models\Funcioanario', 'funcionario_id');
    }


    public function rules($id = '')
    {
        return [
            'descricao' => 'required|min:3|max:150',
                                
        ];
    }



    public function index()
    {
        return $this->orderBy('created_at' , 'desc')->paginate(10);
    }

    
}