<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use Illuminate\Http\Request;

class TopControllerTest extends TestCase
{
    // /**
    //  * Index method Test.
    //  *
    //  * @return void
    //  */
    // public function testIndex()
    // {
    //     //session check

    //     //auth check

    //     // path check

    //     //session null
    //     $this->assertNull(session('search_query'));

    //     //session value
    //     session(['search_query' => "SerchText"]);
    //     $this->assertSame(session('search_query'),"SerchText");

    //     //Mockey
    //     $repositoryMock = Mockery::mock(API_SerchService::class);
    //     $repositoryMock->shouldReceive('getFindVideoByKeywords')->with('ニュース')->andreturn('videoList');
    //     $repositoryMock->getFindVideoByKeywords('ニュース');
    //     $this->assertSame($repositoryMock->getFindVideoByKeywords('ニュース'),'videoList');
    //     $this->instance(IVideoSerchAPIRepository::class, $repositoryMock);


    //     //get request
    //     $response = $this->get(route('top.index'));
    //     $response->assertStatus(200);

    //     //表示画面チェック
    // }

    // /**
    //  *
    //  * @dataProvider dataRequest
    //  */
    // public function testResultChannel(string $id)
    // {
    //     //$id check

    //     //auth check

    //     //session check

    //     //path check

    // }

    // /**
    //  * Result Method Test
    //  * @dataProvider dataRequest
    //  * @param $serch_query
    //  */
    // public function testResult($serch_query)
    // {
    //     //$serch_query check

    //     //auth check

    //     // session check

    //     //path check

    //     if(is_null($serch_query))
    //     {
    //         $this->assertNull($serch_query);
    //         $response = $this->get(route('top.index'));
    //         $response->assertStatus(200);
    //     }
    //     else
    //     {
    //         $this->assertSame($serch_query,'Test Query');
    //         // //Mockey
    //         $repositoryMock = Mockery::mock(API_SerchService::class);
    //         $repositoryMock->shouldReceive('getFindVideoByKeywords')->with('ニュース')->andreturn('videoList');
    //         $repositoryMock->getFindVideoByKeywords('ニュース');
    //         $this->assertSame($repositoryMock->getFindVideoByKeywords('ニュース'),'videoList');
    //         // $this->instance(IVideoSerchAPIRepository::class, $repositoryMock);
    //         // //get request
    //         $response = $this->get(route('top.result'));
    //         $response->assertStatus(302);
    //     }
    // }

    // /**
    //  * Watch Method Test
    //  * @dataProvider dataVideoId
    //  * @param $id
    //  */
    // public function testWatch($id)
    // {
    //     //$id check

    //     //auth check

    //     // session check

    //     //path check
    //     if(is_null($id))
    //     {
    //         $this->assertNull($id);
    //         $response = $this->get(route('top.index'));
    //         $response->assertStatus(200);
    //     }
    //     else
    //     {
    //         $this->assertSame($id,'Test Id');
    //         //Mockey
    //         $repositoryMock = Mockery::mock(API_SerchService::class);
    //         $repositoryMock->shouldReceive('getFindVideoByKeywords')->with('ニュース')->andreturn('videoList');
    //         $repositoryMock->getFindVideoByKeywords('ニュース');
    //         $this->assertSame($repositoryMock->getFindVideoByKeywords('ニュース'),'videoList');
    //         $this->instance(IVideoSerchAPIRepository::class, $repositoryMock);

    //     }
    // }

    /**
     * Index method Test.
     *
     * @return void
     */
    public function testIndex_noAuth()
    {
        //session check
        //session null
        $this->assertNull(session('search_query'));

        //session value
        session(['search_query' => "SerchText"]);
        $this->assertSame(session('search_query'),"SerchText");

        $repositoryMock = Mockery::mock(API_SerchService::class);
        $repositoryMock->shouldReceive('getFindVideoByKeywords')->with('ニュース')->andreturn('videoList')->getMock();
        $repositoryMock->getFindVideoByKeywords('ニュース');
        $this->assertSame($repositoryMock->getFindVideoByKeywords('ニュース'), 'videoList');
        $this->instance(SerchInterfaceRepository::class, $repositoryMock);

        //get request
        $response = $this->get(route('top.index'));
        $response->assertStatus(200);

        //表示画面チェック
    }

    /**
     * ResultChannel test method
     * @dataProvider channelId
     * @param $id
     */
    public function testResultChannel_noAuth($id)
    {
        //$id check
        if(is_null($id))
        {
            $this->assertNull($id);
        }
        else
        {
            $this->assertSame($id,'Test Channel Id');
            //session null
            $this->assertNull(session('search_query'));

            //session value
            session(['search_query' => "SerchText"]);
            $this->assertSame(session('search_query'), "SerchText");

            $repositoryMock = Mockery::mock(API_SerchService::class);
            $repositoryMock->shouldReceive('getFindVideoByChannelId')->with($id)->andreturn('videoList')->getMock();
            $repositoryMock->getFindVideoByChannelId($id);
            $this->assertSame($repositoryMock->getFindVideoByChannelId($id), 'videoList');
            $this->instance(SerchInterfaceRepository::class, $repositoryMock);

            //get request
            $response = $this->get(route('top.resultChannel',$id));
            $response->assertStatus(200);
        }
    }

    /**
     * Result Method Test
     * @dataProvider dataRequest
     * @param $serch_query
     */
    public function testResult_noAuth(string $serch_query)
    {
        //$id check
        // if(is_null($serch_query))
        // {
        //     $this->assertNull($serch_query);
        // }
        // else
        // {
        //     // $this->assertSame($serch_query,'Test Query');
        //     //session null
        //     // $this->assertNull(session('search_query'));

        //     //session value
        //     // session(['search_query' => "SerchText"]);
        //     // $this->assertSame(session('search_query'), "SerchText");

        //     // $repositoryMock = Mockery::mock(API_SerchService::class);
        //     // $repositoryMock->shouldReceive('getFindVideoByKeywords')->with($serch_query)->andreturn('videoList')->getMock();
        //     // $repositoryMock->getFindVideoByKeywords($serch_query);
        //     // $this->assertSame($repositoryMock->getFindVideoByKeywords($serch_query), 'videoList');
        //     // $this->instance(SerchInterfaceRepository::class, $repositoryMock);
            dd($this->get(route('top.result')));
        //     //get request
            $response = $this->get(route('top.result'));
            $response->assertStatus(200);
        // }
    }

    // /**
    //  * Watch Method Test
    //  * @dataProvider dataVideoId
    //  * @param $id
    //  */
    // public function testWatch_noAuth($id)
    // {
    //     //$id check

    //     //auth check

    //     // session check

    //     //path check
    //     if(is_null($id))
    //     {
    //         $this->assertNull($id);
    //         $response = $this->get(route('top.index'));
    //         $response->assertStatus(200);
    //     }
    //     else
    //     {
    //         $this->assertSame($id,'Test Id');
    //         //Mockey
    //         $repositoryMock = Mockery::mock(API_SerchService::class);
    //         $repositoryMock->shouldReceive('getFindVideoByKeywords')->with('ニュース')->andreturn('videoList');
    //         $repositoryMock->getFindVideoByKeywords('ニュース');
    //         $this->assertSame($repositoryMock->getFindVideoByKeywords('ニュース'),'videoList');
    //         $this->instance(IVideoSerchAPIRepository::class, $repositoryMock);

    //     }
    // }

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
    public function channelId()
    {
        return[
            [null],
            ['Test Channel Id']
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
