<?php

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

require_once('BaseTester.php');

#[Group('Item')]
class ItemTest extends BaseTester
{
    #[Test]
    public function it_gets_items_for_an_app_by_user_id()
    {
        $this->requiresApiKey();

        $inventory = $this->steamClient->item()->GetPlayerItems($this->appId, 76561198022436617);

        $this->assertCount(3, $inventory->items);

        $item = $inventory->items->first();

        $this->checkItemProperties($item);
    }
}
