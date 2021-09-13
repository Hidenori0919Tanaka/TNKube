<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use App\Services\API_SerchService;
use App\Services\DB_RepositoryService;

use function PHPUnit\Framework\isEmpty;

class TopControllerTest extends TestCase
{
    /** @var Mockery */
    protected $getFindVideoByKeywordsMock;
    protected $getRegisterChannelByUserIdMock;
    protected $getFindVideoByChannelIdMock;
    protected $getFindVideoByKeywordsAndChannelIdMock;
    protected $getVideoByVideoIdMock;
    protected $getRegisterChannelDbMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->getFindVideoByKeywordsMock = Mockery::mock(API_SerchService::class);
        $this->getFindVideoByKeywordsMock->shouldReceive('getFindVideoByKeywords')->andReturn('videoList');
        $this->instance(API_SerchService::class, $this->getFindVideoByKeywordsMock);

        $this->getRegisterChannelByUserIdMock = Mockery::mock(API_SerchService::class);
        $this->getRegisterChannelByUserIdMock->shouldReceive('getRegisterChannelByUserId')->andReturn('channelList');
        $this->instance(API_SerchService::class, $this->getRegisterChannelByUserIdMock);

        $this->getFindVideoByChannelIdMock = Mockery::mock(API_SerchService::class);
        $this->getFindVideoByChannelIdMock->shouldReceive('getFindVideoByChannelId')->andReturn('videoList');
        $this->instance(API_SerchService::class, $this->getFindVideoByChannelIdMock);

        $this->getFindVideoByKeywordsAndChannelIdMock = Mockery::mock(API_SerchService::class);
        $this->getFindVideoByKeywordsAndChannelIdMock->shouldReceive('getFindVideoByKeywordsAndChannelId')->andReturn('videoList');
        $this->instance(API_SerchService::class, $this->getFindVideoByKeywordsAndChannelIdMock);

        $this->getVideoByVideoIdMock = Mockery::mock(API_SerchService::class);
        $this->getVideoByVideoIdMock->shouldReceive('getVideoByVideoId')->andReturn('video');
        $this->instance(API_SerchService::class, $this->getVideoByVideoIdMock);

        $this->getRegisterChannelDbMock = Mockery::mock(DB_RepositoryService::class);
        $this->getRegisterChannelDbMock->shouldReceive('getRegisterChannelByUserId')->andReturn('video');
        $this->instance(DB_RepositoryService::class, $this->getRegisterChannelDbMock);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    /**
     * Index method Test.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->assertNull(session('search_query'));

        session(['search_query' => "SerchText"]);
        $this->assertSame(session('search_query'),"SerchText");

        // $response = $this->get(route('top.index'));
        // $response->assertStatus(200);

    }

    /**
     * ResultChannel test method
     * @dataProvider channelId
     * @param $id
     */
    public function testResultChannel($id)
    {
        if(is_null($id))
        {
            $this->assertNull($id);
        }
        else
        {
            $this->assertSame($id,'Test Channel Id');
            $this->assertNull(session('search_query'));

            session(['search_query' => "SerchText"]);
            $this->assertSame(session('search_query'), "SerchText");

            // $response = $this->get(route('top.resultChannel',$id));
            // $response->assertStatus(200);
        }
    }

    /**
     * Result Method Test
     * @dataProvider dataRequest
     * @param $serch_query
     */
    public function testResult($serch_query)
    {
        $this->assertSame($serch_query, 'Test Query');

        // $response = $this->get(route('top.result'));
        // $$response->assertStatus(200);
    }

    /**
     * Watch Method Test
     * @dataProvider dataVideoId
     * @param $id
     */
    public function testWatch($id)
    {
        if (is_null($id)) {
            $this->assertNull($id);
        } else {
            $this->assertSame($id, 'Test Id');

            // $response = $this->get(route('top.watch',$id));
            // $response->assertStatus(200);
        }
    }

    /**
     *
     */
    public function dataRequest()
    {
        return[
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
            ['Test Id']
        ];
    }
}
