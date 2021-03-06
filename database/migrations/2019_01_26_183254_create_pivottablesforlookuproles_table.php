<?php

/**
 * This file is part of the Lasalle Software library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright  (c) 2019-2020 The South LaSalle Trading Corporation
 * @license    http://opensource.org/licenses/MIT MIT
 * @author     Bob Bloom
 * @email      bob.bloom@lasallesoftware.ca
 * @link       https://lasallesoftware.ca
 * @link       https://packagist.org/packages/lasallesoftware/lsv2-library-pkg
 * @link       https://github.com/LaSalleSoftware/lsv2-library-pkg
 *
 */

// LaSalle Software
use Lasallesoftware\Library\Database\Migrations\BaseMigration;

// Laravel classes
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePivottablesforlookuprolesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('personbydomain_lookup_roles'))
        {
            Schema::create('personbydomain_lookup_roles', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('personbydomain_id')->unsigned()->index();
                $table->foreign('personbydomain_id')->references('id')->on('personbydomains');
                $table->integer('lookup_role_id')->unsigned()->index();
                $table->foreign('lookup_role_id')->references('id')->on('lookup_roles');
            });
        }
    }
}
