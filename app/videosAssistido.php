<?php

namespace youCollections;

use Illuminate\Database\Eloquent\Model;

class videosAssistido extends Model
{
    protected $primaryKey = 'idVideo';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable=[
        'idVideo',
        'idUser',
    ];


}
