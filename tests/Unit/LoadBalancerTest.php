<?php
declare(strict_types=1);

namespace Tests\Unit;


use App\AlgorithmInterface;
use App\HostInterface;
use App\LoadBalancer;
use http\Env\Request;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class LoadBalancerTest extends TestCase
{
    use ProphecyTrait;

    public function testHandleRequest(): void
    {
        $req = $this->createMock(Request::class);
        $host = $this->prophesize(HostInterface::class);
        $host->handleRequest($req)->shouldBeCalledOnce();
        $alg = $this->prophesize(AlgorithmInterface::class);
        $alg->getHost()->shouldBeCalledOnce()->willReturn($host);
        $alg->addHost($host)->shouldBeCalledOnce();
        $lb = new LoadBalancer([$host->reveal()], $alg->reveal());

        $lb->handleRequest($req);
    }

}