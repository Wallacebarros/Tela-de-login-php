<?php
use PHPUnit\Framework\TestCase;
use App\Helper\Routers;

class RoutersTest extends TestCase
{
    public Routers $routers;
    public function setUp(): void
    {
        $this->routers = new Routers();
    }
    public function testGet(): void
    {
        $this->routers->get('/',  'MeuController@metodo');
        $expected = [
            'method' => 'GET',
            'uri' => '/',
            'controller' => 'MeuController@metodo'
        ];

        $actual = $this->routers->getRouters();

        $this->assertEquals($expected, $actual);
    }
}