<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2015 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Html\Enum;

use Windwalker\Dom\HtmlElement;

/**
 * The DListDescription class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class DListDescription extends HtmlElement
{
	/**
	 * Constructor
	 *
	 * @param mixed  $content Element content.
	 * @param array  $attribs Element attributes.
	 */
	public function __construct($content = null, $attribs = array())
	{
		parent::__construct('dd', $content, $attribs);
	}
}