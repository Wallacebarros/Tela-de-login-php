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
    public function testPost(): void
    {
        $this->routers->post('/',  'MeuController@metodo');
        $expected = [
            'method' => 'POST',
            'uri' => '/',
            'controller' => 'MeuController@metodo'
        ];

        $actual = $this->routers->getRouters();

        $this->assertEquals($expected, $actual);
    }
    public function testPut(): void
    {
        $this->routers->put('/',  'MeuController@metodo');
        $expected = [
            'method' => 'PUT',
            'uri' => '/',
            'controller' => 'MeuController@metodo'
        ];

        $actual = $this->routers->getRouters();

        $this->assertEquals($expected, $actual);
    }
    public function testDelete(): void
    {
        $this->routers->delete('/',  'MeuController@metodo');
        $expected = [
            'method' => 'DELETE',
            'uri' => '/',
            'controller' => 'MeuController@metodo'
        ];

        $actual = $this->routers->getRouters();

        $this->assertEquals($expected, $actual);
    }
}