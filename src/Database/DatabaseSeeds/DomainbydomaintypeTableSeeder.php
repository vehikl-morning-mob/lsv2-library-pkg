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

namespace Lasallesoftware\Library\Database\DatabaseSeeds;

// Laravel Framework
use Illuminate\Support\Facades\DB;

class DomainbydomaintypeTableSeeder extends BaseSeeder
{
    /**
     * Populate the domain_domaintype pivot table with the app's name (well, id) with "adminbackend" (well, 1).
     *
     * @return void
     */
    public function run()
    {
        DB::table('installeddomain_domaintype')->insert([
            'id'                    => $this->getNewInstalleddomain_domaintypeId(),
            'installed_domain_id'   => $this->getInstalledDomainId(),
            'lookup_domain_type_id' => 1,                            // type 1 = adminbackend
        ]);
    }
}
