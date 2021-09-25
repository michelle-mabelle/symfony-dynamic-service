<?php

namespace App;

interface ItemInterface
{
	public function generateInstanceId();
	public function getInstanceId(): int;
}