<?php

declare(strict_types=1);

namespace App\Cached;

use Doctrine\ORM\Mapping as ORM;

class CachedPostEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $post_title;
}
