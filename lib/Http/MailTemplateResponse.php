<?php

/**
 * ownCloud - Template Editor
 *
 * @author Jörn Dreyer <jfd@owncloud.com>
 * @copyright Copyright (c) 2017, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\TemplateEditor\Http;

use OCP\AppFramework\Http\Response;

/**
 * Prompts the user to download the a file
 */
class MailTemplateResponse extends Response {
	private $filename;
	private $contentType;

	/**
	 * Creates a response that prompts the user to download the file
	 * @param string $filename the name that the downloaded file should have
	 * @param string $contentType the mime type that the downloaded file should have
	 */
	public function __construct($filename, $contentType = 'text/php') {
		$this->filename = $filename;
		$this->contentType = $contentType;

		$this->addHeader('Content-Disposition', 'attachment; filename="' . $filename . '"');
		$this->addHeader('Content-Type', $contentType);
	}

	/**
	 * Returns the raw template content
	 * @return string|null the file
	 */
	public function render() {
		return \file_get_contents($this->filename);
	}
}
