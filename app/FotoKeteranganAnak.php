<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FotoKeteranganAnak extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'foto_keterangan_anaks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['image','deskripsi','anak_id'];

}
