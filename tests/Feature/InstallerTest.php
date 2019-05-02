<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstallerTest extends TestCase
{
    /**
     * Ensure configuration
     *
     * @return void
     */
    public function testDefaultAnnouncementExists()
    {
        $this->assertDatabaseHas(
            'announcements',
            [
                "title" => "Welcome to COSST!"
            ]
        );
    }
}
