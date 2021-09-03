<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use Illuminate\Http\Request;

class TopControllerTest extends TestCase
{
    /**
     * Index method Test.
     *
     * @return void
     */
    public function testIndex()
    {
        //session null
        $this->assertNull(session('search_query'));

        //session value
        session(['search_query' => "SerchText"]);
        $this->assertSame(session('search_query'),"SerchText");

        //Mockey
        $repositoryMock = Mockery::mock(API_SerchService::class);
        $repositoryMock->shouldReceive('getFindVideoByKeywords')->with('ニュース')->andreturn('videoList');
        $repositoryMock->getFindVideoByKeywords('ニュース');
        $this->assertSame($repositoryMock->getFindVideoByKeywords('ニュース'),'videoList');
        $this->instance(IVideoSerchAPIRepository::class, $repositoryMock);


        //get request
        $response = $this->get(route('top.index'));
        $response->assertStatus(200);

        //表示画面チェック
    }

    /**
     * Result Method Test
     * @dataProvider dataRequest
     * @param $serch_query
     */
    public function testResult($serch_query)
    {
        if(is_null($serch_query))
        {
            $this->assertNull($serch_query);
            $response = $this->get(route('top.index'));
            $response->assertStatus(200);
        }
        else
        {
            $this->assertSame($serch_query,'Test Query');
            // //Mockey
            $repositoryMock = Mockery::mock(API_SerchService::class);
            $repositoryMock->shouldReceive('getFindVideoByKeywords')->with('ニュース')->andreturn('videoList');
            $repositoryMock->getFindVideoByKeywords('ニュース');
            $this->assertSame($repositoryMock->getFindVideoByKeywords('ニュース'),'videoList');
            // $this->instance(IVideoSerchAPIRepository::class, $repositoryMock);
            // //get request
            $response = $this->get(route('top.result'));
            $response->assertStatus(302);
        }
    }

    /**
     * Watch Method Test
     * @dataProvider dataVideoId
     * @param $id
     */
    public function testWatch($id)
    {
        if(is_null($id))
        {
            $this->assertNull($id);
            $response = $this->get(route('top.index'));
            $response->assertStatus(200);
        }
        else
        {
            $this->assertSame($id,'Test Id');
            //Mockey
            $repositoryMock = Mockery::mock(API_SerchService::class);
            $repositoryMock->shouldReceive('getFindVideoByKeywords')->with('ニュース')->andreturn('videoList');
            $repositoryMock->getFindVideoByKeywords('ニュース');
            $this->assertSame($repositoryMock->getFindVideoByKeywords('ニュース'),'videoList');
            $this->instance(IVideoSerchAPIRepository::class, $repositoryMock);

        }
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
