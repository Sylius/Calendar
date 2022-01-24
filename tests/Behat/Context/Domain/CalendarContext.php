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

namespace Sylius\Calendar\Tests\Behat\Context\Domain;

use Behat\Behat\Context\Context;
use Sylius\Calendar\Provider\DateTimeProviderInterface;
use Webmozart\Assert\Assert;

final class CalendarContext implements Context
{
    public function __construct(private DateTimeProviderInterface $calendar)
    {}

    /**
     * @Then I should be able to use :date as my current date
     */
    public function calendarProvideTheDate(string $date): void
    {
        Assert::same(
            $this->calendar->now()->format("Y-m-d"),
            $date
        );
    }
}
