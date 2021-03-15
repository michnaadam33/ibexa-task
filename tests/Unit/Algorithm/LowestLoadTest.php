<?php
declare(strict_types=1);

namespace Tests\Unit\Algorithm;

use App\Algorithm\LowestLoad;
use App\HostInterface;
use PHPUnit\Framework\TestCase;

class LowestLoadTest extends TestCase
{

    public function testGetHost()
    {
        $host1 = $this->createMock(HostInterface::class);
        $host1->method('getLoad')->willReturn(1.0);
        $alg = new LowestLoad();
        $alg->addHost($host1);

        $this->assertSame($host1, $alg->getHost());
        $host2 = $this->createMock(HostInterface::class);
        $host2->method('getLoad')->willReturn(0.0);
        $alg->addHost($host2);
        $this->assertSame($host2, $alg->getHost());
        $this->assertSame($host2, $alg->getHost());
    }
}
