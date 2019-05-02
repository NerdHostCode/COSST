<?php

namespace Tests\Feature;

use Tests\TestCase;

class InstallerTest extends TestCase
{
    /**
     * Ensure configuration.
     *
     * @return void
     */
    public function testDefaultAnnouncementExists()
    {
        $this->assertDatabaseHas(
            'announcements',
            [
                'title' => 'Welcome to COSST!',
            ]
        );
    }
}
