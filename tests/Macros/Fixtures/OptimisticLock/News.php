<?php

declare(strict_types=1);

namespace Cycle\ORM\Entity\Macros\Tests\Fixtures\OptimisticLock;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\ORM\Entity\Macros\OptimisticLock\OptimisticLockMacro;

#[Entity]
#[OptimisticLockMacro]
class News
{
    #[Column(type: 'primary')]
    public int $id;
}