<?php

/*
 * This file is part of the MonologExtraBundle package.
 *
 * (c) Chaplean.coop <contact@chaplean.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\Chaplean\Bundle\MonologExtraBundle\Monolog;

use Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra;
use Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessor;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;
use Psr\Log\LoggerInterface;

/**
 * Class LoggerExtraTest.
 *
 * @package   Tests\Chaplean\Bundle\MonologExtraBundle\Monolog
 * @author    Hugo - Chaplean <hugo@chaplean.coop>
 * @copyright 2014 - 2019 Chaplean (http://www.chaplean.coop)
 * @version   1.0.0
 */
class LoggerExtraTest extends MockeryTestCase
{
    /**
     * @var LoggerInterface|MockInterface
     */
    private $logger;

    /**
     * @var ExtraFieldsProcessor|MockInterface
     */
    private $extraFieldsProcessor;

    /**
     * @var LoggerExtra
     */
    private $loggerExtra;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->logger = \Mockery::mock(LoggerInterface::class);
        $this->extraFieldsProcessor = \Mockery::mock(ExtraFieldsProcessor::class);

        $this->loggerExtra = new LoggerExtra($this->logger, $this->extraFieldsProcessor);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::__construct()
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(LoggerExtra::class, $this->loggerExtra);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::debug()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testDebug(): void
    {
        $extraFields = ['key' => 'value'];

        $this->extraFieldsProcessor->shouldReceive('setExtraFields')
            ->once()
            ->with($extraFields)
            ->andReturnSelf();

        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('debug')
            ->once()
            ->withArgs(['message', ['extra' => $extraFields]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->debug('message', ['extra' => $extraFields]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::info()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testInfo(): void
    {
        $extraFields = ['key' => 'value'];

        $this->extraFieldsProcessor->shouldReceive('setExtraFields')
            ->once()
            ->with($extraFields)
            ->andReturnSelf();

        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('info')
            ->once()
            ->withArgs(['message', ['extra' => $extraFields]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->info('message', ['extra' => $extraFields]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::notice()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testNotice(): void
    {
        $extraFields = ['key' => 'value'];

        $this->extraFieldsProcessor->shouldReceive('setExtraFields')
            ->once()
            ->with($extraFields)
            ->andReturnSelf();

        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('notice')
            ->once()
            ->withArgs(['message', ['extra' => $extraFields]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->notice('message', ['extra' => $extraFields]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::warning()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testWarning(): void
    {
        $extraFields = ['key' => 'value'];

        $this->extraFieldsProcessor->shouldReceive('setExtraFields')
            ->once()
            ->with($extraFields)
            ->andReturnSelf();

        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('warning')
            ->once()
            ->withArgs(['message', ['extra' => $extraFields]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->warning('message', ['extra' => $extraFields]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::error()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testError(): void
    {
        $extraFields = ['key' => 'value'];

        $this->extraFieldsProcessor->shouldReceive('setExtraFields')
            ->once()
            ->with($extraFields)
            ->andReturnSelf();

        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('error')
            ->once()
            ->withArgs(['message', ['extra' => $extraFields]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->error('message', ['extra' => $extraFields]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::critical()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testCritical(): void
    {
        $extraFields = ['key' => 'value'];

        $this->extraFieldsProcessor->shouldReceive('setExtraFields')
            ->once()
            ->with($extraFields)
            ->andReturnSelf();

        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('critical')
            ->once()
            ->withArgs(['message', ['extra' => $extraFields]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->critical('message', ['extra' => $extraFields]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::alert()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testAlert(): void
    {
        $extraFields = ['key' => 'value'];

        $this->extraFieldsProcessor->shouldReceive('setExtraFields')
            ->once()
            ->with($extraFields)
            ->andReturnSelf();

        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('alert')
            ->once()
            ->withArgs(['message', ['extra' => $extraFields]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->alert('message', ['extra' => $extraFields]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::emergency()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testEmergency(): void
    {
        $extraFields = ['key' => 'value'];

        $this->extraFieldsProcessor->shouldReceive('setExtraFields')
            ->once()
            ->with($extraFields)
            ->andReturnSelf();

        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('emergency')
            ->once()
            ->withArgs(['message', ['extra' => $extraFields]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->emergency('message', ['extra' => $extraFields]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::emergency()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testEmergencyWithoutExtra(): void
    {
        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('emergency')
            ->once()
            ->withArgs(['message', ['other' => []]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->emergency('message', ['other' => []]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::emergency()
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::callLoggerWithExtraFields()
     *
     * @return void
     */
    public function testEmergencyWithExtraButNotArray(): void
    {
        $this->logger->shouldReceive('pushProcessor')
            ->once()
            ->with($this->extraFieldsProcessor)
            ->andReturnSelf();

        $this->logger->shouldReceive('emergency')
            ->once()
            ->withArgs(['message', ['extra' => 200]])
            ->andReturnNull();

        $this->logger->shouldReceive('popProcessor')
            ->once()
            ->andReturnNull();

        $this->loggerExtra->emergency('message', ['extra' => 200]);
    }

    /**
     * @covers \Chaplean\Bundle\MonologExtraBundle\Monolog\LoggerExtra::log()
     *
     * @return void
     */
    public function testLog(): void
    {
        $extraFields = ['key' => 'value'];

        $this->logger->shouldReceive('log')
            ->once()
            ->with(200, 'message', ['extra' => $extraFields])
            ->andReturnSelf();

        $this->loggerExtra->log(200, 'message', ['extra' => $extraFields]);
    }
}
