<?php

namespace App\Actions;

use App\Facades\ApiGitHubFacade;

class GetUserReposGitHubList
{
    public function __invoke(string $userName, string $order)
    {
        $perPage = 30;
        $page = 1;
        $repositories = [];
        $countRepositories = 0;

        do {
            $response = ApiGitHubFacade::get("/users/{$userName}/repos?page={$page}&per_page={$perPage}");
            $pageRepositories = $response->json();

            $repositories = array_merge($repositories, $pageRepositories);

            $countRepositories = count($pageRepositories);

            $page++;
        } while ($countRepositories === $perPage);


        if ($response->failed()) {
            abort(404, 'Usuário não encontrado');
        }


        usort($repositories, function ($first, $second) use ($order) {
            if ($order === 'name') {
                return strcasecmp($first['name'], $second['name']);
            }

            if ($order === 'language') {
                return strcasecmp($first['language'], $second['language']);
            }

            return $second['stargazers_count'] - $first['stargazers_count'];
        });

        return $repositories;
    }
}
