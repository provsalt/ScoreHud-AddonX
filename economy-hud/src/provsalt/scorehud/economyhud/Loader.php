<?php

declare(strict_types=1);

namespace provsalt\scorehud\economyhud;

use pocketmine\plugin\PluginBase;
use provsalt\scorehud\economyhud\events\ChangeListener;

class Loader extends PluginBase {
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents(new ChangeListener(), $this);
	}
}