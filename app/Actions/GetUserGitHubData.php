<?php

namespace App\Actions;

use App\Facades\ApiGitHubFacade;

class GetUserGitHubData
{
    public function __invoke(string $userName)
    {
        $response = ApiGitHubFacade::get("/users/{$userName}");

        if ($response->failed()) {
            abort(404, 'Usuário não encontrado');
        }

        return $response->json();
    }
}
