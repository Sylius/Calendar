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

namespace Sylius\Calendar\Tests\Behat\Context\Setup;

use Behat\Behat\Context\Context;

final class CalendarContext implements Context
{
    public function __construct(private string $projectDirectory)
    {}

    /**
     * @Given it is :dateTime now
     */
    public function itIsNow(string $dateTime): void
    {
        file_put_contents($this->projectDirectory . '/var/temporaryDate.txt', $dateTime);
    }
}
