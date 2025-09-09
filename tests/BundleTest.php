<?php

require_once('BaseTester.php');

/** @group Bundle */
class BundleTest extends BaseTester
{
    /** @test */
    public function it_gets_details_for_a_bundle_by_id()
    {
        $bundles = $this->steamClient->bundle()->bundleDetails($this->bundleId);

        $this->assertCount(1, $bundles);

        $bundle = $bundles->first();

        $this->assertInstanceOf(\Syntax\SteamApi\Containers\Bundle::class, $bundle);

        $this->assertObjectHasProperties(['initial', 'final', 'discount_percent'], $bundle->price);

        $this->assertObjectHasProperties(['windows', 'mac', 'linux'], $bundle->platforms);
    }
}
