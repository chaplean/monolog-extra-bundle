<?php

/*
 * This file is part of the MonologExtraBundle package.
 *
 * (c) Chaplean.coop <contact@chaplean.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\Chaplean\Bundle\MonologExtraBundle\Processor;

use Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor;
use PHPUnit\Framework\TestCase;

/**
 * Class ExtraFieldsProcessorTest.
 *
 * @package   Tests\Chaplean\Bundle\MonologExtraBundle\Processor
 * @author    Hugo - Chaplean <hugo@chaplean.coop>
 * @copyright 2014 - 2019 Chaplean (http://www.chaplean.coop)
 * @version   1.0.0
 */
class ExtraFieldsProcessorTest extends TestCase
{
    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__construct()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__invoke()
     *
     * @return void
     */
    public function testInvokeWithoutExtraFields(): void
    {
        $processor = new ExtraFieldsProcessor();
        $result = $processor->__invoke([]);

        $this->assertSame([], $result);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__construct()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__invoke()
     *
     * @return void
     */
    public function testInvokeWithGlobalExtraFields(): void
    {
        $processor = new ExtraFieldsProcessor(['_env' => 'dev']);
        $result = $processor->__invoke([]);

        $this->assertSame(['extra' => ['_env' => 'dev']], $result);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__construct()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::setExtraFields()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__invoke()
     *
     * @return void
     */
    public function testInvokeWithExtraFields(): void
    {
        $processor = new ExtraFieldsProcessor();
        $processor->setExtraFields(['key' => 'value']);

        $result = $processor->__invoke([]);
        $this->assertSame(['extra' => ['key' => 'value']], $result);

        $result = $processor->__invoke([]);
        $this->assertSame([], $result);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__construct()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::setExtraFields()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__invoke()
     *
     * @return void
     */
    public function testInvokeWithGlobalExtraFieldsAndExtraFields(): void
    {
        $processor = new ExtraFieldsProcessor(['_env' => 'dev']);
        $processor->setExtraFields(['key' => 'value']);

        $result = $processor->__invoke([]);
        $this->assertSame(['extra' => ['_env' => 'dev', 'key' => 'value']], $result);

        $result = $processor->__invoke([]);
        $this->assertSame(['extra' => ['_env' => 'dev']], $result);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__construct()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::setExtraFields()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor::__invoke()
     *
     * @return void
     */
    public function testInvokeWithGlobalExtraFieldsAndExtraFieldsWithSameField(): void
    {
        $processor = new ExtraFieldsProcessor(['_env' => 'dev']);
        $processor->setExtraFields(['key' => 'value', '_env' => 'prod']);

        $result = $processor->__invoke([]);
        $this->assertSame(['extra' => ['_env' => 'prod', 'key' => 'value']], $result);

        $result = $processor->__invoke([]);
        $this->assertSame(['extra' => ['_env' => 'dev']], $result);
    }
}
