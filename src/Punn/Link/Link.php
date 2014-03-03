<?php

namespace Punn\Link;

/**
 * Link helper class for generating URLs (relative and absolute)
 *
 * @author Erik Omlid <erik@madfeller.com>
 * @version 1.0.0
 * @link https://github.com/punn/link
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

class Link
{
	private $links;

	public function add($name, $link)
	{
		if(!is_array($this->links))
		{
			$this->links = array();
		}
		$this->links = array_add($this->links, $name, $link);
	}

	public function get($name, $params = null, $full = true)
	{
		$url = '';
		if(isset($this->links[$name]))
		{
			$url = $this->links[$name];
		}

		if(!empty($url))
		{
			if(count($params) > 0)
			{
				foreach($params as $key => $val)
				{
					$url = str_replace("[" . strtoupper($key). "]", $val, $url);
				}
			}

			$url = preg_replace('/\[.*\]/', '', $url);
			if($full && !preg_match('/^(http|https)/', $url))
			{
				if(substr($url, 0, 1) !== '/' && substr(url('/'), -1) !== '/')
				{
					$url = '/' . $url;
				}

				$url = url('/') . $url;
			}

			return $url;
		}

		return "#";
	}
}