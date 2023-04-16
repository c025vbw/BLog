<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService; //TweetServiceのインポート
use App\Models\Tweet;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // $tweetSevice = new TweetService();
        $tweets = $tweetService->getTweets();
        // $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        return view('tweet.index')->with('tweets',$tweets);
        // dd($tweets);
        // return view('tweet.index', ['name' => 'laravel']);
    }
}
