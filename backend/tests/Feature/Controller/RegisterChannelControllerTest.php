<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterChannelControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Index test Method
     *
     *
     * @return void
     */
    public function testIndex()
    {
        //auth check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Create Test Method
     *
     * @dataProvider string $id
     * @return void
     */
    public function testCreate(string $id)
    {
        //$request check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Store Test Method
     *
     * @dataProvider $request
     * @return void
     */
    public function testStore($request)
    {
        //$request check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * show Test Method
     *
     * @dataProvider string $id
     *
     * @return void
     */
    public function testShow(string $id)
    {
        //$id check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Destroy Test Method
     *
     * @dataProvider string $id
     *
     * @return void
     */
    public function testDestroy(string $id)
    {
        //$chennelId check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Index Test Method
     * NoAuth
     * @return void
     */
    public function testIndex_noAuth()
    {
        //auth check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Create Test Method NoAuth
     *@dataProvider string $id
     * @return void
     */
    public function testCreate_noAuth(string $id)
    {
        //$request check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Store Test Method NoAuth
     * @dataProvider $request
     *
     * @return void
     */
    public function testStore_noAuth($request)
    {
        //$request check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Show Test Method NoAuth
     * @dataProvider string $id
     *
     * @return void
     */
    public function testShow_noAuth(string $id)
    {
        //$id check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Destroy Test Method NoAuth
     *@dataProvider string $id
     * @return void
     */
    public function testDestroy_noAuth(string $id)
    {
        //$chennelId check

        //path check
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     *
     */
    public function dataRequest()
    {
        return[
            [null],
            ['Test Query']
        ];
    }

    /**
     *
     */
    public function dataVideoId()
    {
        return[
            [null],
            ['Test Id']
        ];
    }
}
