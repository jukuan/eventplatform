<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SystemController
{
    /**
     * @Route(
     *     name="healthcheck",
     *     path="/api/v2/health",
     *     methods={"GET"},
     * )
     */
    public function __invoke(): object
    {
        return new JsonResponse([
            'timestamp' => time(),
        ]);
    }
}
