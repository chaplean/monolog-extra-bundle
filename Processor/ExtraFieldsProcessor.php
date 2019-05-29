<?php

/*
 * This file is part of the MonologExtraBundle package.
 *
 * (c) Chaplean.coop <contact@chaplean.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chaplean\Bundle\MonologExtraBundle\Processor;

/**
 * Class ExtraFieldsProcessor.
 *
 * @package   Chaplean\Bundle\MonologExtraBundle\Processor
 * @author    Hugo - Chaplean <hugo@chaplean.coop>
 * @copyright 2014 - 2019 Chaplean (http://www.chaplean.coop)
 * @version   1.0.0
 */
class ExtraFieldsProcessor implements ExtraFieldsProcessorInterface
{
    /**
     * @var array
     */
    protected $globalExtraFields;

    /**
     * @var array
     */
    protected $extraFields;

    /**
     * ExtraFieldsProcessor constructor.
     *
     * @param array|null $globalExtraFields
     */
    public function __construct(array $globalExtraFields = [])
    {
        $this->globalExtraFields = $globalExtraFields;
        $this->extraFields = [];
    }

    /**
     * @param array $extraFields
     *
     * @return self
     */
    public function setExtraFields(array $extraFields): self
    {
        $this->extraFields = $extraFields;

        return $this;
    }

    /**
     * @param array $record
     *
     * @return array
     */
    public function __invoke(array $record): array
    {
        $allExtraFields = array_merge($this->globalExtraFields, $this->extraFields);
        $this->extraFields = [];

        foreach ($allExtraFields as $extraFieldName => $extraFieldValue) {
            $record['extra'][$extraFieldName] = $extraFieldValue;
        }

        return $record;
    }
}
