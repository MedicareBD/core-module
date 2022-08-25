<?php

namespace Modules\Core\Console;

use Artisan;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'medicare:install {--demo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Medicare Installer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Medicare Installing...');
        if (!base_path('.env')){
            $process = new Process(['cp .env.example .env']);
            $process->run();
        }

//        if ($this->option('demo')){
//            Artisan::call('migrate:fresh --seed');
//            Artisan::call('module:seed');
//        }else{
//            Artisan::call('migrate:fresh');
//        }

        Artisan::call('horizon:install');
        Artisan::call('migrate:fresh --seed');
        Artisan::call('module:seed');

        $this->info('Medicare Installed Successfully');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
