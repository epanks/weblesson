<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket_data extends Model
{
    protected $table = 'paket';
    protected $fillable = [
        'kdsatker', 'trgoutput', 'satoutput', 'trgoutcome', 'satoutcome', 'nmpaket', 'pagurmp', 'keuangan', 'progres_fisik', 'TahunFisik'
    ];
}
