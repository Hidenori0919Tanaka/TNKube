<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TopResponseTest extends TestCase
{
    /**
     * Index method Test.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get(route('top.index'));
        $response->assertStatus(200);
    }

    /**
     * ResultChannel test method
     * @param $id
     */
    public function testResultChannel($id = 'id')
    {
        $response = $this->get(route('top.resultChannel', $id));
        $response->assertStatus(200);
    }

    /**
     * Result Method Test
     * @param $serch_query
     */
    // public function testResult()
    // {
    //     $response = $this->get(route('top.result'));
    //     $$response->assertStatus(200);
    // }

    /**
     * Watch Method Test
     * @param $id
     */
    // public function testWatch($id = 'id')
    // {
    //     $response = $this->get(route('top.watch',$id));
    //     $response->assertStatus(200);
    // }
}
