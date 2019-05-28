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

namespace Lasallesoftware\Library\Nova\Fields;

// LaSalle Software class
use Lasallesoftware\Library\Rules\ValueMustBeUnique;

/**
 * Class LookupTitle
 *
 * Designed specifically for use with lookup tables
 *
 * @package Lasallesoftware\Library\Nova\Fields
 */
class LookupTitle extends BaseTextField
{
    /**
     * Create a new custom text field for title.
     *
     * @param  string $name
     * @param  string|null $attribute
     * @param  mixed|null $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->name = __('lasallesoftwarelibrary::general.field_name_lookup_title');

        $this->help('<ul>
                         <li>'. __('lasallesoftwarelibrary::general.field_help_lookup_name') .'</li>
                         <li>'. __('lasallesoftwarelibrary::general.field_help_brief') .'</li>
                         <li>'. __('lasallesoftwarelibrary::general.field_help_max_255_chars') .'</li>
                         <li>'. __('lasallesoftwarelibrary::general.field_help_required') .'</li>
                         <li>'. __('lasallesoftwarelibrary::general.field_help_unique') .'</li>
                     </ul>'
        );

        $this->sanitize();

        $this->specifyShowOnForms();

        $this->sortable();

        $this->rules('required', 'max:255');
    }

    /**
     * This field will display, or not display, on these forms.
     *
     * @return $this
     */
    private function specifyShowOnForms()
    {
        $this->showOnIndex    = true;
        $this->showOnDetail   = true;
        $this->showOnCreation = true;
        $this->showOnUpdate   = true;

        return $this;
    }

    /**
     * Sanitize data
     *
     * @return closure
     */
    private function sanitize()
    {
        return $this->resolveCallback = function ($value) {
            return trim(ucwords($value));
        };
    }
}