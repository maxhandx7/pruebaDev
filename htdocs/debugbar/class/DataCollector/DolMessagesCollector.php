<?php
/* Copyright (C) 2023	Laurent Destailleur		<eldy@users.sourceforge.net>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 *	\file       htdocs/debugbar/class/DataCollector/DolMessagesCollector.php
 *	\brief      Class for debugbar collection
 *	\ingroup    debugbar
 */

use DebugBar\DataCollector\MessagesCollector;

/**
 * DolMessagesCollector class
 */

class DolMessagesCollector extends MessagesCollector
{
	/**
	 *	Return widget settings
	 *
	 *  @return array  Array
	 */
	public function getWidgets()
	{
		global $langs;

		$title = $langs->transnoentities('Messages');
		$name = $this->getName();

		return array(
			"$title" => array(
				"icon" => "list-alt",
				"widget" => "PhpDebugBar.Widgets.MessagesWidget",
				"map" => "$name.messages",
				"default" => "[]"
			),
			"$title:badge" => array(
				"map" => "$name.count",
				"default" => "null"
			)
		);
	}
}
