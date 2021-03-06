<?php

namespace DachcomBundle\Test\Unit;

use DachcomBundle\Test\Test\DachcomBundleTestCase;
use Symfony\Component\HttpFoundation\Request;
use ToolboxBundle\Manager\AreaManager;
use ToolboxBundle\Manager\AreaManagerInterface;
use ToolboxBundle\Manager\ConfigManager;
use ToolboxBundle\Manager\ConfigManagerInterface;

class ContextTest extends DachcomBundleTestCase
{
    /**
     * @throws \Codeception\Exception\ModuleException
     */
    public function testAssureCurrentContext()
    {
        $this->setupRequest();

        /** @var ConfigManagerInterface $configManager */
        $configManager = $this->getContainer()->get(ConfigManager::class);
        $this->assertEquals(true, $configManager->isContextConfig());
    }

    /**
     * @throws \Codeception\Exception\ModuleException
     */
    public function testCurrentContext()
    {
        $this->setupRequest();

        /** @var ConfigManagerInterface $configManager */
        $configManager = $this->getContainer()->get(ConfigManager::class);
        $this->assertEquals('context_a', $configManager->getContextIdentifier());
    }

    /**
     * @throws \Codeception\Exception\ModuleException
     */
    public function testContextAConfiguration()
    {
        $this->setupRequest();

        /** @var AreaManagerInterface $areaManager */
        $areaManager = $this->getContainer()->get(AreaManager::class);
        $areaConfig = $areaManager->getAreaBlockConfiguration('context_element');

        $this->assertEquals(['headline'], $areaConfig['allowed']);
    }

    /**
     * @throws \Codeception\Exception\ModuleException
     */
    private function setupRequest()
    {
        $request = Request::create('/');
        $requestStack = $this->getContainer()->get('request_stack');
        $requestStack->push($request);
    }
}
