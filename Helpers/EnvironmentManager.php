<?php

namespace Modules\Core\Helpers;

use Illuminate\Support\Facades\DB;
use Modules\Core\Http\Requests\DatabaseEnvRequest;

class EnvironmentManager
{
    private string $envPath;

    public function __construct()
    {
        $this->envPath = base_path('.env');
    }

    public function saveDatabaseEnv(DatabaseEnvRequest $request)
    {

    }

    private function checkDatabaseConnection(DatabaseEnvRequest $request)
    {


        return DB::connection()->getPdo();
    }
}
