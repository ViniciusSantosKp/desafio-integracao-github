<?php

namespace App\Actions;

use App\Facades\ApiGitHubFacade;

class GetUserReposGitHubList
{
    public function __invoke(string $userName, string $order)
    {
        $perPage = 100;
        $page = 1;
        $repositories = [];

        do {
            $response = ApiGitHubFacade::get("/users/{$userName}/repos?page={$page}&per_page={$perPage}");
            $pageRepositories = $response->json();

            $repositories = array_merge($repositories, $pageRepositories);

            $page++;
        } while (count($pageRepositories) === $perPage);


        if ($response->failed()) {
            abort(404, 'Usuário não encontrado');
        }

        $repos = $response->json();

        usort($repos, function ($first, $second) use ($order) {
            if ($order === 'name') {
                return strcasecmp($first['name'], $second['name']);
            }

            if ($order === 'language') {
                return strcasecmp($first['language'], $second['language']);
            }

            return $second['stargazers_count'] - $first['stargazers_count'];
        });

        return $repos;
    }
}
