<?php
/**
 * Created by PhpStorm.
 * User: soudev
 * Date: 29/04/18
 * Time: 17:11
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperHeroesImagesModel extends Model
{
    protected $fillable = ['superhero_id', 'image'];

    protected $table = 'superheroes_images';

}