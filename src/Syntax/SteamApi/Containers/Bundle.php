<?php

namespace Syntax\SteamApi\Containers;

use stdClass;

class Bundle extends BaseContainer
{
    public $id;
    public $name;
    public $packageIds;
    public $appIds;
    public $header;
    public $libraryAsset;
    public $price;
    public $platforms;
    public $release;

    public function __construct($bundle)
    {
        $this->id = (int) $bundle->bundleid;
        $this->name = $bundle->name;
        $this->packageIds = $bundle->packageids;
        $this->appIds = $bundle->appids;
        $this->header = $bundle->header_image_url ?? null;
        $this->libraryAsset = $bundle->library_asset ?? null;
        $this->price = new stdClass();
        $this->price->initial = $bundle->initial_price ?? null;
        $this->price->final = $bundle->final_price ?? null;
        $this->price->formatted_orig = $bundle->formatted_orig_price ?? null;
        $this->price->formatted_final = $bundle->formatted_final_price ?? null;
        $this->price->discount_percent = $bundle->discount_percent ?? null;
        $this->price->base_discount = $bundle->bundle_base_discount ?? null;

        $this->platforms = new stdClass();
        $this->platforms->windows = $bundle->available_windows ?? false;
        $this->platforms->mac = $bundle->available_mac ?? false;
        $this->platforms->linux = $bundle->available_linux ?? false;

        $this->release = new stdClass();
        $this->release->date = "";
        $this->release->coming_soon = $bundle->coming_soon ?? false;
    }
}
