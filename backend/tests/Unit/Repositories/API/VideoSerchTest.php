<?php

namespace Tests\Unit\Repositories\API;

use PHPUnit\Framework\TestCase;
use App\Repositories\API\VideoSerch\VideoSerchAPIRepository as videoSerch;
use App\Repositories\API\VideoSerch\DummyVideoSerchAPI as DummyData;
use Google_Client;
use Google_Service_YouTube;

class VideoSerchTest extends TestCase
{
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
        // dd($data);
    }

    /**
     *
     */
    public function test_Repository()
    {
        $serchRepository = new videoSerch();
        $getFindV_keywords = $serchRepository->getFindVideoByKeywords("おのだ");
        // $getFindC_keywords = $serchRepository->getFindChannelByKeywords("おのだ");
        // $getFindV_Channel = $serchRepository->getFindVideoByChannelId("UCor-ItevvphIaF0n8CkY-Xg");
        dd($getFindV_keywords);
        // dd($getFindC_keywords);
        // dd($getFindV_Channel);
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
