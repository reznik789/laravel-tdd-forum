<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
  
    public function testUserCanBrowseThreads() 
    {   
        $thread = factory('App\Thread')->create();
        $response = $this->get('/threads');
        
        $response->assertSee($thread->title);
        
        $response = $this->get('/threads/' . $thread->id);
        
        $response->assertSee($thread->title);
    }  
}
