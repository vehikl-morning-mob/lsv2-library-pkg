<?php

namespace Lasallesoftware\Library\Commands;

// Laravel classes
use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class CustomdropCommand
 *
 * Drops all the database tables.
 *
 * Adapted from
 * https://github.com/laravel/framework/blob/5.7/src/Illuminate/Database/Console/Migrations/FreshCommand.php
 *
 * @package Lasallesoftware\Library\Commands\CustomdropCommand
 */
class CustomdropCommand extends Command
{
    use ConfirmableTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'lslibrary:customdrop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Custom command that drops all the database tables.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        /*
        echo "\n\n====================================================================\n";
        echo "              ** start lslibrary:customdrop **";
        echo "\n====================================================================\n";
        */

        if (strtolower(app('config')->get('app.env')) == "production") {
            $this->info('Cancelled running lslibrary:customdrop because this is a production environment.');
            return;
        }

        if (! $this->confirm("Do you really want to drop your database?")) {
            $this->info('Did not drop database tables because you did not confirm.');
            return;
        }

        $database = $this->input->getOption('database');

        //$this->dropAllViews($database);
        //$this->info('Dropped all views successfully.');

        $this->dropAllTables($database);

        $this->info('  ...just successfully dropped all your database tables...');

        echo "\n  -------------------------------\n";
        if ($this->confirm("  *** do you want to run php artisan migrate? ***")) {
            $this->call('migrate');
            echo "\n";
            $this->info('  ...just ran php artisan migrate...');
        } else {
            $this->info(' (did *not* run php artisan migrate)');
        }

        echo "\n  -------------------------------\n";
        if ($this->confirm("  *** do you want to run php artisan lslibrary:customseed?***")) {
            $this->call('lslibrary:customseed');
            echo "\n";
            $this->info('  ...just ran php artisan lslibrary:customseed...');
        } else {
            $this->info(' (did *not* run php artisan lslibrary:customseed)');
        }

        //echo "\n\n";

        echo "\n\n====================================================================\n";
        echo "              ** lslibrary:customdrop is finished **";
        echo "\n====================================================================\n\n";
    }

    /**
     * Drop all of the database tables.
     *
     * @param  string  $database
     * @return void
     */
    protected function dropAllTables($database)
    {
        $this->laravel['db']->connection($database)
            ->getSchemaBuilder()
            ->dropAllTables();
    }

    /**
     * Drop all of the database views.
     *
     * @param  string  $database
     * @return void
     */
    protected function dropAllViews($database)
    {
        $this->laravel['db']->connection($database)
            ->getSchemaBuilder()
            ->dropAllViews();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use'],
        ];
    }
}