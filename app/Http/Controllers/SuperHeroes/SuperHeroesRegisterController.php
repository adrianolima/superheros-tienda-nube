<?php
/**
 * Created by PhpStorm.
 * User: soudev
 * Date: 29/04/18
 * Time: 09:35
 */

namespace App\Http\Controllers\SuperHeroes;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\SuperHeroesImagesModel;
use App\SuperHeroesModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class SuperHeroesRegisterController extends Controller
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
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
            [
                'nickname' => 'required|string|max:50',
                'real_name' => 'required|string|max:150',
                'superpowers' => 'required|string',
                'catch_phrase' => 'required|string',
            ],
            [
                'nickname.required' => 'Oh no, a hero needs a nickname',
                'nickname.max' => 'A short nickname is better, choose a nickname with max 50 characters',
                'real_name.required' => 'We need know your real name',
                'superpowers.required' => 'We need know your super powers',
                'catch_phrase.required' => 'We need know your catch phrase',
            ]);
    }



    public function postSave(UploadRequest $request)
    {
        $input = Input::all();
        $validator = $this->validator($input);

        $super_hero =  new SuperHeroesModel;
        $super_hero = $super_hero->firstOrNew(['id'=>$input['id']]);

        if ($validator->fails()) {

            return redirect()->route('superheroes', ['id' => $super_hero['id']])
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $super_hero = $super_hero->firstOrNew(['id'=>$input['id']]);
            $super_hero->fill($input);
            if ($super_hero->save()) {
                if($request->photos ) {
                    foreach ($request->photos as $photo) {
                        $filename = $photo->store('photos');
                        SuperHeroesImagesModel::create([
                            'superhero_id' => $super_hero->id,
                            'image' => $filename
                        ]);
                    }
                }


                return redirect()->route('superheroes', ['id' => $super_hero['id']])->with('success', 'Wow! The world is more safe now!!');
            } else {
                return redirect()->route('superheroes', ['id' => $super_hero['id']])->with('error', 'Ops! Some is wrong!!');
            }

        } catch (\Exception $e) {
                return redirect('superheroes')->with('error', $e->getMessage());
        }

    }


}