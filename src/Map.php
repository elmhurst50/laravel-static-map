<?php

namespace samjoyce777\LaravelStaticMap;

use GoogleMapStatic\StaticMap;
use GoogleMapStatic\Generators\UrlGenerator;
use GoogleMapStatic\Elements\Marker\Marker;
use GoogleMapStatic\UnitMeasures\Coordinate;
use GoogleMapStatic\Elements\Marker\MarkerStyle;
use GoogleMapStatic\UnitMeasures\MapSize;


class Map
{

    protected $config;


    /**
     * Primary call to class that returns a google url to the custom static map
     * @param $lat
     * @param $lng
     * @param string $setting
     * @param array $override
     * @return string
     */
    public function getMap($lat, $lng, $setting = 'default', $override = array())
    {
        if ($setting == null) $setting = 'default';

        $this->setMapConfig($setting, $override);

        $map = new StaticMap();

        $map->setZoom($this->config["zoom"]);

        $map->setType($this->config["type"]);

        $map->setSize(new MapSize($this->config["width"], $this->config["height"]));

        $urlGenerator = new UrlGenerator();

        $map->addMarker(new Marker(new Coordinate($lat, $lng), new MarkerStyle()));

        return $urlGenerator->generate($map);
    }


    /**
     * Sets the map configuration and applies any override requested by call
     * @param $setting
     * @param $override
     * @return $this
     * @throws \Exception
     */
    protected function setMapConfig($setting, $override)
    {
        $config = config('map.settings.' . $setting);

        if(!is_array($config)) throw new \Exception($setting .' does not appear to be a setting in the config');

        $this->config = array_merge($config, $override);

        return $this;
    }
}