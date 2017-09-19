<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Anak extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'anaks';

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
    protected $fillable = ['nama_lengkap','gender','tanggal_lahir','tempat_lahir','agama','suku','state_id','city_id','alamat','deskripsi','admin_id', 'image'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->umur;
    }
    
}
