<?php

namespace App;

class AbstractItem
{
	private int $instanceId;
	
	public function __construct()
	{
	}
	
	public function generateInstanceId()
	{
		$this->instanceId = random_int(1,999999);
	}
	
	public function getInstanceId(): int
	{
		return $this->instanceId;
	}
}