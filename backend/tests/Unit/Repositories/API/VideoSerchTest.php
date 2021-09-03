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
    }

    /**
     *
     */
    public function test_Repository()
    {
        $serchRepository = new videoSerch();
        $getFindV_keywords = $serchRepository->getFindVideoByKeywords("おのだ");
        dd($getFindV_keywords);
    }
}
