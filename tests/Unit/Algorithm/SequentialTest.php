<?php
declare(strict_types=1);

namespace Tests\Unit\Algorithm;

use App\Algorithm\Sequential;
use App\HostInterface;
use PHPUnit\Framework\TestCase;

class SequentialTest extends TestCase
{

    public function testGetHost()
    {
        $host1 = $this->createMock(HostInterface::class);
        $host2 = $this->createMock(HostInterface::class);
        $alg = new Sequential();
        $alg->addHost($host1);
        $alg->addHost($host2);

        $this->assertSame($host1, $alg->getHost());
        $this->assertSame($host2, $alg->getHost());
    }
}
