<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class FollowsController extends Controller
{
    public function followList(Post $post)
    {
        $followsId = Follow::where('follow_id', Auth::id())->pluck('follower_id')->toArray();
        $followIdLists = User::find($followsId);
        $timelines = $post->getFollowTimelines($followsId);

        return view('follows.followList')
            ->with([
                'followIdLists' => $followIdLists,
                'timelines' => $timelines,
            ]);
    }

    public function followerList(Post $post)
    {
        $followersId = Follow::where('follower_id', Auth::id())->pluck('follow_id')->toArray();
        $followIdLists = User::find($followersId);
        $timelines = $post->getFollowTimelines($followersId);

        return view('follows.followerList')
            ->with([
                'followIdLists' => $followIdLists,
                'timelines' => $timelines,
            ]);
    }
}
