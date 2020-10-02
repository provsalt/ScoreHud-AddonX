<?php

declare(strict_types=1);

namespace provsalt\scorehud\economyhud\events;

use Ifera\ScoreHud\event\PlayerTagUpdateEvent;
use Ifera\ScoreHud\event\TagsResolveEvent;
use Ifera\ScoreHud\scoreboard\ScoreTag;
use onebone\economyapi\EconomyAPI;
use onebone\economyapi\event\money\MoneyChangedEvent;
use pocketmine\event\Listener;
use pocketmine\Server;

class ChangeListener implements Listener{
	public function onMoney(MoneyChangedEvent $event) :void{
		$server = Server::getInstance();
		$tag = new PlayerTagUpdateEvent($server->getPlayerExact($event->getUsername()), new ScoreTag("economyapi.money", strval($event->getNewMoney())));
		$tag->call();
	}
	public function onResolve(TagsResolveEvent $event) :void{
		if ($event->getTag()->getName() === "economyapi.money") {
			$bal = EconomyAPI::getInstance()->myMoney($event->getPlayer());

			$event->getTag()->setValue(strval($bal));
		}
	}
}