<?php

namespace Tests\Unit\Repositories\API;

use PHPUnit\Framework\TestCase;
use Mockery;
use App\Repositories\API\VideoSerch\DummyVideoSerchAPI as DummyData;
use App\Repositories\API\VideoSerch\IVideoSerchAPIRepository as GetSerchVideo;

class VideoSerchTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_Rep()
    {
        //ダミーデータ
        $obj = new DummyData();
        $data = $obj->getFindVideoByKeywords("test");
        //Mockey
        $repositoryMock = \Mockery::mock(GetSerchVideo::class);
        $repositoryMock->shouldReceive('getFindVideoByKeywords')
            ->andReturn($data)
            ->getMock();
        
        //ここでエラー
        $this->App->instance(IVideoSerchAPIRepository::class, $this->$repositoryMock);

        // $this->mock(Service::class, function ($mock) {
        //     $mock->shouldReceive('getFindVideoByKeywords')->andReturn($data);
        // });

        //Assert
        $this->assertTrue(true);
    }
}
