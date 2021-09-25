<?php

namespace App\Controller;

use App\ItemA;
use App\ItemB;
use App\ItemBuilder;

class DynamicServiceController
{
	const CR = "\n";
	
	public function __construct(private ItemBuilder $itemBuilder)
	{
	}
	
	public function run()
	{
		$serviceIdList = [
			ItemA::class,
			ItemB::class,
			ItemA::class,
			ItemB::class,
		];
		
		foreach ($serviceIdList as $serviceId)
		{
			$this->generateItem($serviceId);
		}
	}
	
	public function generateItem($serviceId)
	{
		/** @var \App\ItemInterface $itemGeneric */
		$itemGeneric = $this->itemBuilder->handleService($serviceId);
		
		if($itemGeneric)
		{
			echo self::CR.'Service "'.$serviceId.'" found, instanceId is:'.$itemGeneric->getInstanceId();
		}
		else
		{
			echo self::CR.'Service id "'.$serviceId.'" not found.';
		}
	}

}