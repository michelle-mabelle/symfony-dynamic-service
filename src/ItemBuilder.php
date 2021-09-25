<?php

namespace App;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

class ItemBuilder implements ServiceSubscriberInterface
{
	public function __construct(private ContainerInterface $locator)
	{

	}
	
	public static function getSubscribedServices(): array
	{
		return [
			'App\ItemA' => ItemA::class,
			'App\ItemB' => ItemB::class,
		];
	}
	
	public function handleService(string $serviceId): ?ItemInterface
	{
		if ($this->locator->has($serviceId))
		{
			/** @var \App\ItemInterface $itemGeneric */
			$itemGeneric = $this->locator->get($serviceId);
			$itemGeneric->generateInstanceId();
			return $itemGeneric;
		}
		return null;
	}
}