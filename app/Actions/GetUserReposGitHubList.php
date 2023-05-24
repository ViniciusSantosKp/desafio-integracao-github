<?php

namespace App\Actions;

use App\Facades\ApiGitHubFacade;

class GetUserReposGitHubList
{
    public function __invoke(string $userName, string $order)
    {
        $response = ApiGitHubFacade::get("/users/{$userName}/repos");

        if ($response->failed()) {
            abort(404, 'Usuário não encontrado');
        }

        $repos = $response->json();

        usort($repos, function ($a, $b) use ($order) {
            if ($order === 'name') {
                return strcasecmp($a['name'], $b['name']);
            }

            if ($order === 'language') {
                return strcasecmp($a['language'], $b['language']);
            }

            return $b['stargazers_count'] - $a['stargazers_count'];
        });

        return $repos;
    }
}
