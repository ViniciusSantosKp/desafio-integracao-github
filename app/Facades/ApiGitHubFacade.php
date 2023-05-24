<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiGitHubFacade extends Facade
{
	//criação da facade para facilitar a chamada da api
    protected static function getFacadeAccessor()
 	{
 		return 'api-git-hub';
 	}
}
