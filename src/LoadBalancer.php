<?php
declare(strict_types=1);

namespace App;


use http\Env\Request;
use Webmozart\Assert\Assert;

class LoadBalancer
{
    private AlgorithmInterface $algorithm;

    /**
     * LoadBalancer constructor.
     * @param iterable|HostInterface[] $hosts
     * @param AlgorithmInterface $algorithm
     */
    public function __construct(iterable $hosts, AlgorithmInterface $algorithm)
    {
        $this->algorithm = $algorithm;
        foreach ($hosts as $host) {
            Assert::implementsInterface($host, HostInterface::class);
            $this->algorithm->addHost($host);
        }
    }

    public function handleRequest(Request $request): void
    {
        $host = $this->algorithm->getHost();
        $host->handleRequest($request);
    }
}