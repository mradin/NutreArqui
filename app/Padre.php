<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Padre extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'padres';

    /**
     * The primary key is NOT the default for Eloquent Model
     *
     * @var string
     */
    protected $primaryKey = 'id_padre';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellidos', 'curp', 'tipo'];

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ninos(){
        return $this->hasMany('App\Nino');
    }

}
