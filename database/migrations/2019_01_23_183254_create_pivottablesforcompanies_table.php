<?php

/**
 * This file is part of the Lasalle Software library (lasallesoftware/library)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright  (c) 2019 The South LaSalle Trading Corporation
 * @license    http://opensource.org/licenses/MIT MIT
 * @author     Bob Bloom
 * @email      bob.bloom@lasallesoftware.ca
 * @link       https://lasallesoftware.ca Blog, Podcast, Docs
 * @link       https://packagist.org/packages/lasallesoftware/library Packagist
 * @link       https://github.com/lasallesoftware/library GitHub
 *
 */

// LaSalle Software
use Lasallesoftware\Library\Database\Migrations\BaseMigration;

// Laravel classes
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePivottablesforcompaniesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('company_person'))
        {
            Schema::create('company_person', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('person_id')->unsigned()->index();
                $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_address'))
        {
            Schema::create('company_address', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('address_id')->unsigned()->index();
                $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_email'))
        {
            Schema::create('company_email', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('email_id')->unsigned()->index();
                $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_social'))
        {
            Schema::create('company_social', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('social_id')->unsigned()->index();
                $table->foreign('social_id')->references('id')->on('socials')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_telephone'))
        {
            Schema::create('company_telephone', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('telephone_id')->unsigned()->index();
                $table->foreign('telephone_id')->references('id')->on('telephones')->onDelete('cascade');
            });
        }

        if (!Schema::hasTable('company_website'))
        {
            Schema::create('company_website', function (Blueprint $table)
            {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();

                $table->integer('company_id')->unsigned()->index();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->integer('website_id')->unsigned()->index();
                $table->foreign('website_id')->references('id')->on('websites')->onDelete('cascade');
            });
        }
    }
}