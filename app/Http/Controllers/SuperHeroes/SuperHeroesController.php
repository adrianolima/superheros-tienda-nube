<?php
/**
 * Created by PhpStorm.
 * User: soudev
 * Date: 29/04/18
 * Time: 09:35
 */

namespace App\Http\Controllers\SuperHeroes;

use App\Http\Controllers\Controller;
use App\SuperHeroesImagesModel;
use App\SuperHeroesModel;


class SuperHeroesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hero  = new SuperHeroesModel;
        if (filter_input(INPUT_GET, 'id')) {
            $hero = SuperHeroesModel::find(filter_input(INPUT_GET, 'id'));
        }
        return view('superheroes/index', ['hero' => $hero]);
    }

    public function getDeleteHero()
    {
        try {
            $hero = SuperHeroesModel::find(filter_input(INPUT_GET, 'id'));
            if ($hero) {
                $hero->delete();
            } else {
                return redirect()->route('superheroes/list')->with('error', ':( No hero was found');
            }
            return redirect()->route('superheroes/list')->with('success', "Succes, but the world is less safe now without {$hero->nickname}");
        } catch (\Exception $e) {
            return redirect()->route('superheroes/list')->with('error', $e->getMessage());
        }
    }

    public function getEditHero()
    {
        $hero = SuperHeroesModel::find(filter_input(INPUT_GET, 'id'))->toArray();
        return redirect()->route('superheroes', ['id' => $hero['id']])
            ->withInput($hero);
    }

    public function getListHeroes()
    {
        $super_heroes = SuperHeroesModel::orderBy('nickname', 'DESC')->paginate(5);
        return view('superheroes/list', ['super_heroes' => $super_heroes]);
    }

    public function getSeeHero()
    {
        $hero = SuperHeroesModel::find(filter_input(INPUT_GET, 'id'));
        return view('superheroes/see', ['hero' => $hero]);
    }

    public function postDeleteHeroPhoto()
    {
        try {
            $img = SuperHeroesImagesModel::find(filter_input(INPUT_POST, 'id'));
            if ($img) {
                $img->delete();
                $info = ['info' => 'Image deleted!!!', 'error' => false];
            } else {
                $info = ['info' => 'Ops some is wrong!', 'error' => true];
            }
        } catch (\Exception $e) {
            $info = ['info' => $e->getMessage(), 'error' => true];
        }
        echo json_encode($info);
    }


}