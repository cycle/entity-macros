<?php

declare(strict_types=1);

namespace Cycle\SmartMapper\Behavior\OptimisticLock;

use Cycle\ORM\Heap\Node;

class RecordIsLockedException extends \RuntimeException
{
    public function __construct(Node $node)
    {
        $message = sprintf('The `%s` record is locked.', $node->getRole());

        parent::__construct($message);
    }
}