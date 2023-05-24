<?php

namespace App\Actions;

use App\Facades\ApiGitHubFacade;

class GetUserRepoData
{
    public function __invoke(string $owner, string $repo)
    {
        $response = ApiGitHubFacade::get("/repos/{$owner}/{$repo}");

        if ($response->failed()) {
            abort(404, 'Usuário não encontrado');
        }

        $repo = $response->json();

        return $repo;
    }
}
