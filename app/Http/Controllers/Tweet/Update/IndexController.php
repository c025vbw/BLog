<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

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
        $tweetId = (int) $request->route('tweetId');
        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)){
            throw new AccessDeniedException();
        }
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        // return view('tweet.update')->with('tweet', $tweet);
        // $tweet = Tweet::where('id',$tweetId)->first();
        // if (is_null($tweet)){
        //     throw new NotFoundHttpException('存在しないツイートです');
        // }
        // dd($tweet);
        return view('tweet.update')->with('tweet', $tweet);
    }
}
