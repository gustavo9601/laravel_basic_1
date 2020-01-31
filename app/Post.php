<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // especifica el nombre de la tabla en BD
    protected $table = 'posts';

    // Le especificamos la llame primaria diferente a ID
    protected $primaryKey = 'id';

    // le especificamos las columnas de base de datos, que se pueden rellenar y exponer sin ninung problema
    // Sirve para proteger parametros que no se deben actualizar o mutar
    protected $fillable = [
        'title',
        'body'
    ];

    // el contrario de fillable, es como una black list, para que no se editen ni se expongan
    protected $guarded = [
        'deleted',
    ];



}
