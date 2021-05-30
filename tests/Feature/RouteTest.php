<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBasic()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testInfoPagesAbout()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function testInfoPagesFeedback()
    {
        $response = $this->get('/feedback');
        $response->assertStatus(200);
    }

    public function testNews()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function testNewsCategories()
    {
        $response = $this->get('/news/categories');
        $response->assertStatus(200);
    }

    public function testAdminCategories()
    {
        $response = $this->get('admin/categories');
        $response->assertStatus(200);
    }

    public function testAdminNewsShow()
    {
        $response = $this->get('admin/news/show');
        $response->assertStatus(200);
    }

    public function testAdminNewsEdit()
    {
        $response = $this->get('admin/news/edit');
        $response->assertStatus(200);
    }


}
