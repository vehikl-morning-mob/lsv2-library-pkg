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

namespace Lasallesoftware\Library\Dusk;

use Laravel\Dusk\Browser;

// LaSalle Software
use Lasallesoftware\Library\Dusk\LaSalleElementResolver;

/*
 * GUESS WHAT? DUSK DOES NOT RECOGNIZE THE TRIX INPUT FIELD!
 *
 * SO I AM BUILDING IN THIS RECOGNITION MYSELF.
 *
 * IN MY DUSK TESTS, THIS IS WHAT I WANT TO DO TO USE THE trix input field:  browse->typeTrix('field', $value)
 *
 * SO, I NEED...
 *   ** TO CREATE A CUSTOM BROWSER INSTANCE THAT ITSELF HAS METHODS TO RECOGNIZE AND PROCESS "->typeTrix()"
 *   ** CREATE THE METHODS THAT DO THE PROCESSING BY EXTENDING THE BASE CLASS THAT PROCESS "->type()", SINCE
 *      MY PROCESSING MIMICS WHAT IS DONE WITH "->type()"
 *
 *
 */
class LaSalleBrowser extends Browser
{
    /**
     * Create a browser instance.
     *
     * @param  \Facebook\WebDriver\Remote\RemoteWebDriver  $driver
     * @param  ElementResolver  $resolver
     * @return void
     */
    public function __construct($driver, $resolver = null)
    {
        $this->driver   = $driver;
        $this->resolver = $resolver ?: new LaSalleElementResolver($driver);
    }

    /**
     * Type the given value in the given trix field.
     *
     * @param  string  $field
     * @param  string  $value
     * @return $this
     */
    public function typeTrix($field, $value)
    {
        $this->resolver->resolveForTypingTrix($field)->clear()->sendKeys($value);
        return $this;
    }

    /**
     * Clear the given trix field.
     *
     * @param  string  $field
     * @return $this
     */
    public function clearTrix($field)
    {
        $this->resolver->resolveForTypingTrix($field)->clear();
        return $this;
    }

}
