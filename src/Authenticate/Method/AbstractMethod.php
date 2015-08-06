<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

namespace Windwalker\Authenticate\Method;

/**
 * The AbstractMethod class.
 * 
 * @since  2.0
 *
 * @deprecated  Use Authentication package instead.
 */
abstract class AbstractMethod implements MethodInterface
{
	/**
	 * Property status.
	 *
	 * @var integer
	 */
	protected $status;

	/**
	 * getStatus
	 *
	 * @return  integer
	 */
	public function getStatus()
	{
		return $this->status;
	}
}
