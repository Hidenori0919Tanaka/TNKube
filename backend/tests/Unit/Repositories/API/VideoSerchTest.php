<?php

namespace Tests\Unit\Repositories\API;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Mockery;
use App\Repositories\API\VideoSerch\DummyVideoSerchAPI as DummyData;
use App\Repositories\API\VideoSerch\VideoSerchAPIRepository as videoSerch;
use App\Repositories\API\VideoSerch\IVideoSerchAPIRepository as GetSerchVideo;
use App\Services\API_SerchService as SerchService;
use App\Models\API\ExtractData;

class VideoSerchTest extends TestCase
{
    public function setUp(): void
    {
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @group dataExtract
     * @group serchAPI_Video
     * @group keywords
     */
    public function testExData_serchVideos()
    {
        //ダミーデータ
        $obj = new DummyData();
        $data = $obj->getFindVideoByKeywords();

        $extract = new ExtractData();
        $videos = $extract->extract_snippect($data);

        //配列の取り出し
    }

    // public function test_Rep()
    // {
    //     //ダミーデータ
    //     $obj = new DummyData();
    //     $data = $obj->getFindVideoByKeywords("test");
    //     //Mockey
    //     $repositoryMock = Mockery::mock(GetSerchVideo::class);
    //     $repositoryMock->shouldReceive('getFindVideoByKeywords')->andReturn($data);
    //     $this->instance(IVideoSerchAPIRepository::class, $repositoryMock);

    //     //Assert
    //     $this->assertTrue(true);
    // }
}
