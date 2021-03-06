<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Database\Test;

use Windwalker\Test\Helper\TestStringHelper;
use Windwalker\Test\Traits\BaseAssertionTrait;

/**
 * The AbstractQueryTestCase class.
 *
 * @since  2.1
 */
class AbstractQueryTestCase extends \PHPUnit\Framework\TestCase
{
    use BaseAssertionTrait;

    /**
     * Property quote.
     *
     * @var  array
     */
    protected static $quote = ['"', '"'];

    /**
     * quote
     *
     * @param string $text
     *
     * @return  string
     */
    protected function qn($text)
    {
        return TestStringHelper::quote($text, static::$quote);
    }

    /**
     * format
     *
     * @param   string $sql
     *
     * @return  String
     */
    protected function format($sql)
    {
        return \SqlFormatter::format((string) $sql, false);
    }
}
