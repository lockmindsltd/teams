<?php


namespace Lockminds\Teams\Console;


use Illuminate\Console\Command;

class UpdateLockmindsTeams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lockminds:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Lockminds Teams package';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Updating Lockminds...');

        $this->info('Publishing configuration...');

        $this->call('vendor:publish', [
            '--provider' => "Lockminds\Teams\TeamsServiceProvider",
            '--tag' => "lockminds-config"
        ]);

        $this->info('Publishing view...');

        $this->call('vendor:publish', [
            '--provider' => "Lockminds\Teams\TeamsServiceProvider",
            '--tag' => "lockminds-views"
        ]);

        $this->info('Updated Lockminds Teams');

    }
}
