<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Nino extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ninos';

    /**
     * The primary key is NOT the default for Eloquent Model
     *
     * @var string
     */
    protected $primaryKey = 'id_nino';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellidos', 'fec_nac', 'edad', 'padre_id'];

    // Treat it as a Carbon Instance
    protected $dates = ['fec_nac'];

    /*
     * Set date attribute
     */
    public function setFecNacAttribute($date){
        $this->attributes['fec_nac'] = Carbon::parse($date);
    }

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function padre(){
        return $this->belongsTo('App\Padre');
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
