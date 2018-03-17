<?php
/**
 * DropboxFactory.php
 *
 * @copyright      More in license.md
 * @license        http://www.ipublikuj.eu
 * @author         Adam Kadlec http://www.ipublikuj.eu
 * @package        iPublikuj:Flysystem!
 * @subpackage     Adapters
 * @since          1.0.0
 *
 * @date           19.04.16
 */

declare(strict_types = 1);

namespace IPub\Flysystem\Factories\Adapters;

use Nette\DI;
use Nette\Utils;

use League\Flysystem\Dropbox;

use Dropbox\Client;

/**
 * Dropbox adapter filesystem factory
 *
 * @package        iPublikuj:Flysystem!
 * @subpackage     Adapters
 *
 * @author         Adam Kadlec <adam.kadlec@ipublikuj.eu>
 */
class DropboxFactory
{
	/**
	 * @param Utils\ArrayHash $parameters
	 * @param DI\Container $container
	 *
	 * @return Dropbox\DropboxAdapter
	 */
	public static function create(Utils\ArrayHash $parameters, DI\Container $container) : Dropbox\DropboxAdapter
	{
		/** @var Client $client */
		$client = $container->getService($parameters->client);

		return new Dropbox\DropboxAdapter(
			$client,
			$parameters->prefix
		);
	}
}
