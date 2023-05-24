<?php

namespace App\Http\Controllers;

use App\Actions\GetUserGitHubData;
use App\Actions\GetUserRepoData;
use App\Actions\GetUserReposGitHubList;
use App\Http\Requests\SearchUserGitHubFormRequest;
use Illuminate\Support\Arr;

class ApiGitHubController extends Controller
{
    public function getUser(SearchUserGitHubFormRequest $request)
    {

        $order = Arr::get($request->getData(), 'order') ?: 'star';
        $userName = Arr::get($request->getData(), 'name');
        $user = (new GetUserGitHubData())($userName);
        $repos = (new GetUserReposGitHubList())($userName, $order);

        return view('user', [
            'user' => $user,
            'repos' => $repos,
            'order' => $order,
        ]);
    }

    public function getRepo($owner, $repo)
    {
        $repo = (new GetUserRepoData())($owner, $repo);

        return view('repo', ['repo' => $repo,]);
    }
}
