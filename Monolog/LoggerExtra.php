<?php

/*
 * This file is part of the MonologExtraBundle package.
 *
 * (c) Chaplean.coop <contact@chaplean.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chaplean\Bundle\MonologExtraBundle\Monolog;

use Chaplean\Bundle\MonologExtraBundle\Processor\ExtraFieldsProcessorInterface;
use Psr\Log\LoggerInterface;

/**
 * Class LoggerExtra.
 *
 * @package   Chaplean\Bundle\MonologExtraBundle\Monolog
 * @author    Hugo - Chaplean <hugo@chaplean.coop>
 * @copyright 2014 - 2019 Chaplean (http://www.chaplean.coop)
 * @version   1.0.0
 */
class LoggerExtra implements LoggerInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ExtraFieldsProcessorInterface
     */
    protected $extraFieldsProcessor;

    /**
     * LoggerExtra constructor.
     *
     * @param LoggerInterface      $logger
     * @param ExtraFieldsProcessorInterface $extraFieldsProcessor
     */
    public function __construct(LoggerInterface $logger, ExtraFieldsProcessorInterface $extraFieldsProcessor)
    {
        $this->logger = $logger;
        $this->extraFieldsProcessor = $extraFieldsProcessor;
    }

    /**
     * Adds a log record at the DEBUG level.
     *
     * @param string $message The log message
     * @param array  $context The log context
     *
     * @return void
     */
    public function debug($message, array $context = []): void
    {
        $this->callLoggerWithExtraFields($message, 'debug', $context);
    }

    /**
     * Adds a log record at the INFO level.
     *
     * @param string $message The log message
     * @param array  $context The log context
     *
     * @return void
     */
    public function info($message, array $context = []): void
    {
        $this->callLoggerWithExtraFields($message, 'info', $context);
    }

    /**
     * Adds a log record at the NOTICE level.
     *
     * @param string $message The log message
     * @param array  $context The log context
     *
     * @return void
     */
    public function notice($message, array $context = []): void
    {
        $this->callLoggerWithExtraFields($message, 'notice', $context);
    }

    /**
     * Adds a log record at the WARNING level.
     *
     * @param string $message The log message
     * @param array  $context The log context
     *
     * @return void
     */
    public function warning($message, array $context = []): void
    {
        $this->callLoggerWithExtraFields($message, 'warning', $context);
    }

    /**
     * Adds a log record at the ERROR level.
     *
     * @param string $message The log message
     * @param array  $context The log context
     *
     * @return void
     */
    public function error($message, array $context = []): void
    {
        $this->callLoggerWithExtraFields($message, 'error', $context);
    }

    /**
     * Adds a log record at the CRITICAL level.
     *
     * @param string $message The log message
     * @param array  $context The log context
     *
     * @return void
     */
    public function critical($message, array $context = []): void
    {
        $this->callLoggerWithExtraFields($message, 'critical', $context);
    }

    /**
     * Adds a log record at the ALERT level.
     *
     * @param string $message The log message
     * @param array  $context The log context
     *
     * @return void
     */
    public function alert($message, array $context = []): void
    {
        $this->callLoggerWithExtraFields($message, 'alert', $context);
    }

    /**
     * Adds a log record at the EMERGENCY level.
     *
     * @param string $message The log message
     * @param array  $context The log context
     *
     * @return void
     */
    public function emergency($message, array $context = []): void
    {
        $this->callLoggerWithExtraFields($message, 'emergency', $context);
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function log($level, $message, array $context = []): void
    {
        $this->logger->log($level, $message, $context);
    }

    /**
     * @param string $message The log message
     * @param string $logType The log type
     * @param array  $context The log context
     *
     * @return void
     */
    private function callLoggerWithExtraFields($message, string $logType, array $context = []): void
    {
        if (isset($context['extra']) && is_array($context['extra'])) {
            $this->extraFieldsProcessor->setExtraFields($context['extra']);
        }

        $this->logger->pushProcessor($this->extraFieldsProcessor)->$logType($message, $context);
        $this->logger->popProcessor();
    }
}
