<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\Dom\Helper;

/**
 * The DomHelper class.
 *
 * @since  2.0
 */
class DomHelper
{
    /**
     * A simple method to minify Dom and Html.
     *
     * Code from: http://stackoverflow.com/questions/6225351/how-to-minify-php-page-html-output
     *
     * @param string $buffer
     *
     * @return  mixed
     */
    public static function minify($buffer)
    {
        $search = [
            // Strip whitespaces after tags, except space
            '/\>[^\S]+/s',

            // Strip whitespaces before tags, except space
            '/[^\S]+\</s',

            // Shorten multiple whitespace sequences
            '/(\s)+/s',
        ];

        $replace = [
            '>',
            '<',
            '\\1',
        ];

        $buffer = preg_replace($search, $replace, $buffer);

        return $buffer;
    }
}
