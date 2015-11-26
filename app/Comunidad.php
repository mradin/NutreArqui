<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comunidades';

    /**
     * The primary key is NOT the default for Eloquent Model
     *
     * @var string
     */
    protected $primaryKey = 'id_comunidad';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'estado'];

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visitas(){
        return $this->hasMany('App\Visitas');
    }

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ninos(){
        return $this->hasMany('App\Nino');
    }

}
