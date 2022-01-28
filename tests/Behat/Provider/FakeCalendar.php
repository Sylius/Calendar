<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Calendar\Tests\Behat\Provider;

use Sylius\Calendar\Provider\DateTimeProviderInterface;

final class FakeCalendar implements DateTimeProviderInterface
{
    private string $temporaryDatePath;

    public function __construct(string $projectDirectory)
    {
        $this->temporaryDatePath = $projectDirectory . '/var/temporaryDate.txt';
    }

    public function now(): \DateTimeInterface
    {
        if (file_exists($this->temporaryDatePath)) {
            $dateTime = file_get_contents($this->temporaryDatePath);

            return new \DateTimeImmutable($dateTime);
        }

        return new \DateTimeImmutable();
    }
}
