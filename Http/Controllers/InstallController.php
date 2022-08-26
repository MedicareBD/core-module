<?php

namespace Modules\Core\Http\Controllers;

use Artisan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Core\Helpers\EnvironmentManager;
use Modules\Core\Http\Requests\DatabaseEnvRequest;

class InstallController extends Controller
{
    private EnvironmentManager $environmentManager;

    public function __construct(EnvironmentManager $environmentManager)
    {
        $this->environmentManager = $environmentManager;
    }

    public function index()
    {
        return view('core::install.index');
    }

    public function getDatabaseInformation(DatabaseEnvRequest $request)
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        $results = $this->environmentManager->saveDatabaseEnv($request);

        if ($results['success']){
            Artisan::call('key:generate --force');
            Artisan::call('optimize:clear');
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            Artisan::call('storage:link');
            Artisan::call('migrate --seed --force');
            Artisan::call('module:seed --force');
        }
        return response()->json([
            'message' => $results['message'],
//            'redirect' => route('')
        ], $results['code']);
    }
}
