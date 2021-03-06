<?php

declare(strict_types=1);

namespace provsalt\scorehud\cpshud\events;

use Ifera\ScoreHud\event\TagsResolveEvent;
use pocketmine\event\Listener;
use pocketmine\Server;

class CPSEvent implements Listener {
	public function resolve(TagsResolveEvent $event) :void{
		if ($event->getTag()->getName() === "cps.cps") {
			$event->getTag()->setValue(Server::getInstance()->getPluginManager()->getPlugin("CPS")->getClicks($event->getPlayer()));
		}
	}
}