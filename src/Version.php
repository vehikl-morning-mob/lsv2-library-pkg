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

namespace Lasallesoftware\Library;

class Version
{
    /**
     * This package's version number.
     *
     * @var string
     */
    const VERSION = '2.0.0';

    /**
     * This package's name.
     *
     * @var string
     */
    const PACKAGE = 'Library package for my LaSalle Software Version 2';

    /**
     * Get the version number of this package.
     *
     * @return string
     */
    public function version()
    {
        return static::VERSION;
    }

    /**
     * Get the name of this package.
     *
     * @return string
     */
    public function packageName()
    {
        return static::PACKAGE;
    }
}