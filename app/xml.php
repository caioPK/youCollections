<?php

namespace youCollections;

use Illuminate\Database\Eloquent\Model;

class xml extends Model
{

    protected $primaryKey = 'idUser';
    protected $table = 'xmls';

    protected $fillable=[
        'idUser',
        'filePath',
    ];

}
