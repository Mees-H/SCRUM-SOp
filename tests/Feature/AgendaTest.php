<?php

namespace Tests\Unit;

use App\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery\MockInterface;

class AgendaTest extends TestCase
{
    use RefreshDatabase;

    public function testiCalDownload()
    {
        //Arrange

        //Act
        $result = $this->get('evenement/export');

        //Assert
        $result->assertSuccessful();
        $result->assertDownload('special-golf-evenementen.ics');
    }
}
