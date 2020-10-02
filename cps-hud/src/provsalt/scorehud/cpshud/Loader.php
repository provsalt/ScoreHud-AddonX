<?php

declare(strict_types=1);

namespace provsalt\scorehud\cpshud;

use pocketmine\plugin\PluginBase;
use provsalt\scorehud\cpshud\events\CPSEvent;
use provsalt\scorehud\cpshud\tasks\CheckCPS;

class Loader extends PluginBase {
	public function onEnable() :void{
		$this->getServer()->getPluginManager()->registerEvents(new CPSEvent(), $this);
		$this->getScheduler()->scheduleRepeatingTask(new CheckCPS(), 20);
	}
}