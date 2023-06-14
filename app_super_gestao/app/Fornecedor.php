<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //
    use SoftDeletes;

    protected $table = 'Fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
