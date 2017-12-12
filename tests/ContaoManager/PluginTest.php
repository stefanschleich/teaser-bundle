<?php
/*
* This file is part of Contao.
*
* Copyright (c) 2017 Jan Karai
*
* @license LGPL-3.0+
*/
namespace Dehil\TeaserBundle\Tests\ContaoManager;
use Contao\CoreBundle\ContaoCoreBundle;
use Dehil\TeaserBundle\DehilTeaserBundle;
use Dehil\TeaserBundle\ContaoManager\Plugin;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use PHPUnit\Framework\TestCase;
/**
* Tests the Plugin class.
*
* @author Jan Karai <http://www.sachsen-it.de>
*/
class PluginTest extends TestCase {
    /**
    * Tests the object instantiation.
    */
    public function testCanBeInstantiated() {
        $plugin = new Plugin();
        $this->assertInstanceOf('Dehil\TeaserBundle\ContaoManager\Plugin', $plugin);
    }
    /**
    * Tests returning the bundles.
    */
    public function testReturnsTheBundles() {
        $parser = $this->createMock(ParserInterface::class);
        /** @var BundleConfig $config */
        $config = (new Plugin())->getBundles($parser)[0];
        $this->assertInstanceOf('Contao\ManagerPlugin\Bundle\Config\BundleConfig', $config);
        $this->assertSame(DehilTeaserBundle::class, $config->getName());
        $this->assertSame([ContaoCoreBundle::class], $config->getLoadAfter());
        $this->assertSame(['teaser'], $config->getReplace());
    }
}