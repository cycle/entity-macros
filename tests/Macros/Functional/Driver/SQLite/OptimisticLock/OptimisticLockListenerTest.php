<?php

declare(strict_types=1);

namespace Cycle\ORM\Entity\Macros\Tests\Functional\Driver\SQLite\OptimisticLock;

// phpcs:ignore
use Cycle\ORM\Entity\Macros\Tests\Functional\Driver\Common\OptimisticLock\OptimisticLockListenerTest as CommonClass;

/**
 * @group driver
 * @group driver-sqlite
 */
class OptimisticLockListenerTest extends CommonClass
{
    public const DRIVER = 'sqlite';
}