<?php

namespace App\Command;

use App\Controller\DynamicServiceController;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DynamicServiceCommand extends Command
{
	protected static $defaultName = 'dynamic-service:run';
	
	public function __construct(private DynamicServiceController $dynamicServiceController, string $name = null)
	{
		parent::__construct($name);
	}
	
	protected function configure()
	{
		$this->setDescription('DynamicService');
	}
	
	protected function execute(InputInterface $input, OutputInterface $output) : int
	{
		$this->dynamicServiceController->run();
		
		return Command::SUCCESS;
	}
}