<?php
/**
 * UserControllerTest.php
 *
 * @author cnastasi - Christian Nastasi <christian.nastasi@dxi.eu>
 * Created on Jun 11, 2015, 14:47
 * Copyright (C) DXI Ltd
 */

namespace YAUM\Symfony\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserControllerTest
 * @package AppBundle\Tests\Controller
 */
class UserControllerTest extends WebTestCase
{

    static public $expected = array(
        '{"members":{"id":1,"acronym":"LKY","firstName":"Lucky","lastName":"Luke"}}',
        '{"members":{"id":1,"acronym":"JWN","firstName":"John","lastName":"Wayne"}}',
    );

    public function setUp()
    {
        $this->client = static::createClient();
    }

    protected function assertJsonResponse(Response $response, $statusCode = 200)
    {
        $this->assertEquals(
            $statusCode, $response->getStatusCode(),
            $response->getContent()
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    }

    /**
     * @test
     */
    public function shouldLogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/login/pippo/pluto');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("Hello pippo")')->count() > 0);
    }

    /**
     * @test
     */
    public function shouldNotLoginCauseWrongUsername()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldNotLoginCauseWrongPassword()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldSignup()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldNotSignupCauseBadRequest()
    {
        $this->markTestSkipped();
    }
}
