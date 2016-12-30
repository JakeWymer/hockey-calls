<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Message;
use GuzzleHttp\Client;
use Auth;
use DB;

class MessagesController extends Controller
{
    public function index()
    {	
    	$messages = DB::table('messages')
                        ->join('competitors', 'competitors.id', '=', 'messages.competitor_id')
                        ->orderBy('messages.id', 'desc')
                        ->take(5)
                        ->get();

    	return view('messages.index', compact('messages'));
    }

    public function getGif(Request $request) {

    	$competitor_id = Auth::user()->competitor_id;

        $search_text = $request->message;

    	$tag = urlencode($search_text);

    	$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'http://api.giphy.com/v1/gifs/random?api_key=dc6zaTOxFJmzC&tag=' . $tag);
		$res = json_decode($res->getBody());

		$message = Message::create(['competitor_id' => $competitor_id, 'search_text' => $search_text, 'image_path' => $res->data->image_url]);

    	return redirect()->back();
    }
}
