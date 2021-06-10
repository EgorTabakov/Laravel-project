<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test1Example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://site.test/admin/news/create')
                ->select('category_id', 'Новости науки')
                ->type('title', 'Браузерный тест')
                ->type('description', 'Некоторая полезная информация')
                ->press('Добавить новость')
                    ->assertPathIs('/admin/news');
        });
    }
}
