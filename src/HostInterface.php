<?php
declare(strict_types=1);

namespace App;


use http\Env\Request;

interface HostInterface
{
    public function getLoad(): float;
    public function handleRequest(Request $request): void;
}