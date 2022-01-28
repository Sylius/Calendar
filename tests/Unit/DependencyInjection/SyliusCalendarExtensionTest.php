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

namespace Sylius\Calendar\Tests\Unit\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Sylius\Calendar\DependencyInjection\SyliusCalendarExtension;
use Sylius\Calendar\Provider\Calendar;
use Sylius\Calendar\Tests\Behat\Provider\FakeCalendar;

final class SyliusCalendarExtensionTest extends AbstractExtensionTestCase
{
    /** @test */
    public function it_loads_services_in_prod_environment(): void
    {
        $this->container->setParameter('kernel.environment', 'prod');
        $this->load();

        $this->assertContainerBuilderHasService('Sylius\Calendar\Provider\DateTimeProviderInterface', Calendar::class);
    }

    /** @test */
    public function it_loads_services_in_test_environment(): void
    {
        $this->container->setParameter('kernel.environment', 'test');
        $this->load();

        $this->assertContainerBuilderHasService('Sylius\Calendar\Provider\DateTimeProviderInterface', FakeCalendar::class);
    }

    protected function getContainerExtensions(): array
    {
        return [new SyliusCalendarExtension()];
    }
}
