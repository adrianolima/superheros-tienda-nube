<?php
/**
 * Created by PhpStorm.
 * User: soudev
 * Date: 29/04/18
 * Time: 11:52
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class SuperHeroesModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'superheroes';
    protected $fillable = ['nickname', 'real_name', 'origin_description', 'superpowers', 'catch_phrase'];

    public function photos()
    {
        return $this->hasMany('App\SuperHeroesImagesModel', 'superhero_id', 'id');
    }

    public function photo()
    {
        return $this->hasOne('App\SuperHeroesImagesModel', 'superhero_id', 'id');
    }


}