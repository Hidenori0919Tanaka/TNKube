<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use App\Services\API_SerchService;
use App\Services\DB_RepositoryService;
use Illuminate\Support\Facades\Validator;;

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
        // $this->instance(API_SerchService::class, $this->getFindVideoByKeywordsMock);

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

        $this->assertSame($this->getFindVideoByKeywordsMock->getFindVideoByKeywords('ニュース'),'videoList');
        $this->instance(API_SerchService::class, $this->getFindVideoByKeywordsMock);
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
            $this->instance(API_SerchService::class, $this->getFindVideoByKeywordsMock);
        }
    }

    /**
     * Result Method Test
     * @dataProvider dataRequest
     * @param $serch_query
     */
    public function testResult()
    {
        $validatorTrue = Validator::make([
            'search_query' => "パス",
        ], [
            'search_query' => 'required'
        ], [
            'search_query.required' => '検索キーワードを入力してください'
        ])->passes();
        $validatorFalse = Validator::make([
            'search_query' => "",
        ], [
            'search_query' => 'required'
        ], [
            'search_query.required' => '検索キーワードを入力してください'
        ])->passes();
        $this->assertTrue($validatorTrue);
        $this->assertFalse($validatorFalse);
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
