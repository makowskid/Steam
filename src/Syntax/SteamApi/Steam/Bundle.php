<?php

namespace Syntax\SteamApi\Steam;

use GuzzleHttp\Exception\GuzzleException;
use Syntax\SteamApi\Client;
use Illuminate\Support\Collection;
use Syntax\SteamApi\Containers\Bundle as BundleContainer;

class Bundle extends Client
{
    public function __construct()
    {
        parent::__construct();

        $this->url = 'http://store.steampowered.com/';
        $this->interface = 'actions';
    }

    /**
     * @param int|int[] $id
     * @throws GuzzleException
     * @return Collection<int,BundleContainer>
     */
    public function bundleDetails(int|array $id, ?string $cc = null, ?string $language = null): Collection
    {
        // Set up the api details
        $this->method = 'ajaxresolvebundles';
        $this->version = null;
        // Set up the arguments
        $arguments = [
            'bundleids'  => $id,
            'cc'         => $cc ? strtoupper($cc) : "-",
            'l'          => $language ?: "-",
        ];

        $bundles = $this->setUpClient($arguments);
        $bundles = array_map(fn($bundle) => new BundleContainer($bundle), $bundles);

        return new Collection($bundles);
    }
}
