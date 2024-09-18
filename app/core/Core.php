<?php
namespace App\Core;
use App\Helper\Routers;
class Core
{
    public Routers $routers;

    public function __construct()
    {
        $this->routers = new Routers();
    }
    public function start(): void
    {
        $this->routers;
    }
}