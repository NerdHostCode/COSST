<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic test to ensure routing of core functionality works
     * as expected.
     *
     * @return void
     */
    public function testRouting()
    {
        // Index/Dashboard
        $index = $this->get('/');
        $index->assertStatus(200);

        // Announcements
        $announcements = $this->get('/announcements');
        $announcements->assertStatus(200);

        //Service Status
        $serviceStatus = $this->get('/status');
        $serviceStatus->assertStatus(200);
    }

    /**
     * @depends testRouting
     *
     * @return void
     */
    public function testErrors()
    {
        // Ensure 404 is displayed when a row does not exist.

        // Row 123 does not exist in the database immediately after install.
        $announcements = $this->get('/announcements/123');
        $announcements->assertStatus(404);
    }
}
