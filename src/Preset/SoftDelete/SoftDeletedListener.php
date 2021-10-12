<?php

declare(strict_types=1);

namespace Cycle\ORM\Entity\Macros\Preset\SoftDelete;

use Cycle\ORM\Command\StoreCommand;
use Cycle\ORM\Heap\Node;
use Cycle\ORM\Entity\Macros\Attribute\Listen;
use Cycle\ORM\Entity\Macros\Event\Mapper\Command\OnDelete;

final class SoftDeletedListener
{
    public function __construct(
        private string $field = 'deletedAt',
    ) {
    }

    #[Listen(OnDelete::class)]
    public function __invoke(OnDelete $event): void
    {
        $time = new \DateTimeImmutable();
        $event->state->register($this->field, $time);

        // Replace Delete command to Store command
        if (!$event->command instanceof StoreCommand) {
            $event->command = $event->mapper->queueUpdate($event->entity, $event->node, $event->state);
        }

        // Node should be removed from heap
        $event->state->setStatus(Node::SCHEDULED_DELETE);
    }
}
