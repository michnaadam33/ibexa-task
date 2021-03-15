<?php
declare(strict_types=1);

namespace App\Algorithm;


use App\AlgorithmInterface;
use App\HostInterface;
use Webmozart\Assert\Assert;

class LowestLoad implements AlgorithmInterface
{
    private const LOAD_LIMIT = 0.75;

    /**
     * @var HostInterface[]
     */
    private array $hosts = [];

    public function getHost(): HostInterface
    {
        Assert::notEmpty($this->hosts, 'Empty hosts list');
        $minLoadHost = null;
        foreach ($this->hosts as $host){
            $load = $host->getLoad();
            if ($load < self::LOAD_LIMIT){
                return $host;
            }
            if (is_null($minLoadHost) || $load < $minLoadHost->getLoad()){
                $minLoadHost = $host;
            }
        }

        return $minLoadHost;

    }

    public function addHost(HostInterface $host): AlgorithmInterface
    {
        $this->hosts[] = $host;
        return $this;
    }
}