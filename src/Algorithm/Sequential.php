<?php
declare(strict_types=1);

namespace App\Algorithm;


use App\AlgorithmInterface;
use App\HostInterface;
use Webmozart\Assert\Assert;

class Sequential implements AlgorithmInterface
{
    /**
     * @var HostInterface[]
     */
    private array $hosts = [];

    private int $counter = 0;

    public function getHost(): HostInterface
    {
        Assert::notEmpty($this->hosts, 'Empty hosts list');

        return $this->hosts[$this->counter++];
    }

    public function addHost(HostInterface $host): AlgorithmInterface
    {
        $this->hosts[] = $host;
        return $this;
    }

}