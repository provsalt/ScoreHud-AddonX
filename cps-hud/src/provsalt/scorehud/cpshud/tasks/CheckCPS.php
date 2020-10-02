<?php

declare(strict_types=1);

namespace provsalt\scorehud\cpshud\tasks;

use Ifera\ScoreHud\event\PlayerTagUpdateEvent;
use Ifera\ScoreHud\scoreboard\ScoreTag;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class CheckCPS extends Task {

	public function onRun(int $currentTick) :void{
		foreach(Server::getInstance()->getOnlinePlayers() as $player){
			(new PlayerTagUpdateEvent($player, new ScoreTag("cps.cps", strval(Server::getInstance()->getPluginManager()->getPlugin("CPS")->getClicks($player)))))->call();
		}
	}
}