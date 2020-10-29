<?php


namespace Lockminds\Teams\Console;


use Illuminate\Console\Command;

class InstallLockmindsTeams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lockminds:install';

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
        $this->info('Installing Lockminds...');

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

        $this->info('Publishing migrations...');

        $this->call('vendor:publish', [
            '--provider' => "Lockminds\Teams\TeamsServiceProvider",
            '--tag' => "lockminds-migrations"
        ]);

        $this->info('Publishing seeds...');

        $this->call('vendor:publish', [
            '--provider' => "Lockminds\Teams\TeamsServiceProvider",
            '--tag' => "lockminds-seeds"
        ]);

        $this->info('Running Migrations...');

        $this->call('migrate', [
                '--path' => 'database/migrations/2020_09_15_095958_teams_tables.php'
            ]);

        $this->call('migrate',[
            '--path'=> 'database/migrations/2020_09_24_160637_create_permission_tables.php'
        ]);

        $this->info('Running Seeding...');
        $this->call('db:seed',[
            '--class'=>'PermissionsSeeder'
        ]);

        $this->info('Installed Lockminds Teams');

    }
}
