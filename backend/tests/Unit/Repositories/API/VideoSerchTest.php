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
    // public function testExData_serchVideos()
    // {
    //     //ダミーデータ
    //     $obj = new DummyData();
    //     $data = $obj->getFindVideoByKeywords();

    //     $extract = new ExtractData();
    //     $videos = $extract->extract_snippect($data);
    //     $videos = array_filter($videos, function($var){return !is_null($var);} );
    //     dd($videos);
    //     //配列の取り出し
    //     foreach($videos as $v){
    //         dd($v->channelId);
    //     }
    // }

    /**
     *
     */
    public function test_Repository()
    {
        $serchRepository = new videoSerch();
        $getFindV_keywords = $serchRepository->getFindVideoByKeywords("おのだ");
        $getFindC_keywords = $serchRepository->getFindChannelByKeywords("おのだ");
        $getFindV_Channel = $serchRepository->getFindVideoByChannelId("UCor-ItevvphIaF0n8CkY-Xg");
        // dd($getFindV_keywords);
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
