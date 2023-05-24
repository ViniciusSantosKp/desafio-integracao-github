<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ApiGitHubProvider extends ServiceProvider
{
    //Criando um service provider para facilitar a chamada da api
    public function register()
    {
        $this->app->bind('api-git-hub', function() {
            return Http::withOptions([
                'verify' => false,
                'base_uri' => 'https://api.github.com',
            ]);
        });
    }
}
