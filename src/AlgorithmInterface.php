<?php
declare(strict_types=1);

namespace App;


interface AlgorithmInterface
{
    public function getHost(): HostInterface;

    public function addHost(HostInterface $host): AlgorithmInterface;
}