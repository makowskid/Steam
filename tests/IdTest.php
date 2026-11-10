<?php

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Syntax\SteamApi\Exceptions\UnrecognizedId;

require_once('BaseTester.php');

#[Group('Id')]
class IdTest extends BaseTester {

    /**
     * @throws UnrecognizedId
     */
    #[Test]
    public function it_converts_an_id()
    {
        $ids = $this->steamClient->convertId($this->id64);

        $this->assertEquals($this->id32, $ids->id32);
        $this->assertEquals($this->id64, $ids->id64);
        $this->assertEquals($this->id3, $ids->id3);
    }

}
