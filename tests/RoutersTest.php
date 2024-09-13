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
        $expected = [[
            'method' => 'GET',
            'uri' => '/',
            'controller' => 'MeuController@metodo'
        ]];

        $actual = $this->routers->getRouters();

        $this->assertEquals($expected, $actual);
    }
    public function testPost(): void
    {
        $this->routers->post('/',  'MeuController@metodo');
        $expected = [[
            'method' => 'POST',
            'uri' => '/',
            'controller' => 'MeuController@metodo'
        ]];

        $actual = $this->routers->getRouters();

        $this->assertEquals($expected, $actual);
    }
    public function testPut(): void
    {
        $this->routers->put('/',  'MeuController@metodo');
        $expected = [[
            'method' => 'PUT',
            'uri' => '/',
            'controller' => 'MeuController@metodo'
        ]];

        $actual = $this->routers->getRouters();

        $this->assertEquals($expected, $actual);
    }
    public function testDelete(): void
    {
        $this->routers->delete('/',  'MeuController@metodo');
        $expected = [[
            'method' => 'DELETE',
            'uri' => '/',
            'controller' => 'MeuController@metodo'
        ]];

        $actual = $this->routers->getRouters();

        $this->assertEquals($expected, $actual);
    }
    public function testMultiplasRotas():void
    {
        $this->routers->get('/',  'MeuController@metodo');
        $this->routers->post('/',  'MeuController@metodo');

        $this->routers->get('/home',  'MeuController@metodo');
        $this->routers->post('/home',  'MeuController@metodo');

        $expected = [
            [
                'method' => 'GET',
                'uri' => '/',
                'controller' => 'MeuController@metodo'
            ],
            [
                'method' => 'POST',
                'uri' => '/',
                'controller' => 'MeuController@metodo'
            ],
            [
                'method' => 'GET',
                'uri' => '/home',
                'controller' => 'MeuController@metodo'
            ],
            [
                'method' => 'POST',
                'uri' => '/home',
                'controller' => 'MeuController@metodo'
            ]
        ];

        $actual = $this->routers->getRouters();

        $this->assertEquals($expected, $actual);
    }

    public function testeLoadController(): void
    {
        $this->routers->get('/', 'HomeController@index');

        $expected = 'Teste index';

        ob_start();
        $this->routers->run('/', 'GET');
        $actual = ob_get_clean();   

        $this->assertEquals($expected, $actual);
    }
}