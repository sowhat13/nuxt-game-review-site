<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MarcReichel\IGDBLaravel\Models\Game;

class gamecontroller extends Controller
{
    public function index($count=8){
     
     $games=Game::select(["*"])->orderBy('popularity', 'desc')->whereNotNull('cover' , 'url')->with([

     'age_ratings' => ['category','rating'],
     'cover' => ['url', 'image_id'],
     'screenshots' => ['url', 'image_id'],
     'keywords' => ['name', 'slug', 'url'],
     'genres' => ['name', 'slug', 'url'],
     'artworks' => ['game', 'url' , "image_id"],
     'game_modes' => ['name', 'slug', 'url'],
     'platforms' => ['abbreviation', 'name', 'platform_logo', 'slug', 'url'],
     'videos' => ['name', 'video_id'],
  
     'game_engines' => ['name', 'slug', 'url'],])->take($count)->get();
    
 

   
   
     return response()->json([
       "count"=>count($games),
       "data"=>$games
   ]);

   
    }

    public function search($slug){

     
        $games=Game::select(["*"])->where('slug',$slug)->with([

            'age_ratings' => ['category','rating'],
            'cover' => ['url', 'image_id'],
            'screenshots' => ['url', 'image_id'],
            'keywords' => ['name', 'slug', 'url'],
            'genres' => ['name', 'slug', 'url'],
            'game_modes' => ['name', 'slug', 'url'],
            'platforms' => ['abbreviation', 'name', 'platform_logo', 'slug', 'url'],
            'videos' => ['name', 'video_id'],
            'artworks' => ['game', 'url' , "image_id"],
            'involved_companies' => ['publisher', 'developer', 'checksum'],
            'game_engines' => ['name', 'slug', 'url'  ],])->get();

            return response()->json([
             $games
            ]);
   
   
        }
     
    

}


