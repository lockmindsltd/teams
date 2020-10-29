<?php


namespace Lockminds\Teams\Tests\Unit;


use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class InstallLockmindsTeamsTest extends TestCase
{
    /** @test */
    function the_install_command_copies_the_configuration()
    {
        // make sure we're starting from a clean state
        if (File::exists(config_path('blogpackage.php'))) {
            unlink(config_path('blogpackage.php'));
        }

        $this->assertFalse(File::exists(config_path('blogpackage.php')));

        Artisan::call('lockminds:install');

        $this->assertTrue(File::exists(config_path('blogpackage.php')));
    }
}
