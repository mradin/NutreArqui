<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'visitas';

    /**
     * The primary key is NOT the default for Eloquent Model
     *
     * @var string
     */
    protected $primaryKey = 'id_visita';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha', 'comunidad_id'];

    // Treat it as a Carbon Instance
    protected $dates = ['fecha'];

    /*
     * Set date attribute
     */
    public function setFechaAttribute($date){
        $this->attributes['fecha'] = Carbon::parse($date);
    }

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comunidad(){
        return $this->belongsTo('App\Comunidad');
    }

}
