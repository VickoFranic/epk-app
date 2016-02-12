<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Facebook\Facebook;
use DB;
use Log;

class EpkController extends Controller
{
	/**
	 * Band page ID
	 */
	protected $id;


	/**
	 * Get band page data - name, genre, about, bio, band_members, photos 
	 *
	 * @param Illuminate\Http\Request;
	 * @return mixed
	 */
    public function getPageDataFromId(Request $request)
    {
    	$this->id = $request->input('id');

    	$facebook = new Facebook();
    	$helper = $facebook->getJavaScriptHelper();
    	$accessToken = $helper->getAccessToken();

    	$query = '/' . $this->id . '?fields=name,genre,about,bio,band_members,picture.width(400).height(400),cover,albums{photos{images.width(500).height(500)}}';
    	$band = $facebook->get($query, $accessToken)->getDecodedBody();

        //VALIDATOR NAPRAVITI
        if(!isset($band['bio'])) {
            $band['bio'] = 'Nema biografije';
        }


    	$this->band = $band;
   		$this->storeBand($band);

 		return view('app')->with('band', $band);
    }

    public function storeBand($band)
    {
    	DB::table('bands')->insert(
    		[
    			'name' 		=> $band['name'],
    			'genre' 	=> $band['genre'],
    			'about'		=> $band['about'],
    			'bio'		=> e($band['bio']),
    			'picture'	=> $band['picture']['data']['url'],
    			'members'	=> e($band['band_members']),
    			'cover'		=> $band['cover']['source'],
    		]);
    	
    	Log::info('Bend upisan: ' . $band['name']);	
    }
}
