<?php

namespace Tests\Unit;

use Tests\TestCase;

class ticketControllerTest extends TestCase
{
    public function testCreate(): void
    {
        $response = $this->postJson('/api/ticket', ['id'=> '1','preis' => '12',
        'reihe' => '12',
        'sitz' => '2',
        'kaufdatum' => '2023-04-01',
        'sprache' => 'Englisch',
        'dimension' => '3D',
        'filmstart' => '2023-04-05 18:30:00',
        'film_id' => '3']);
       
        $response
            ->assertStatus(200);
            $this->assertEquals('erfolgreich gespeichert', $response->getContent());
    }

    public function testRead(): void
    {
    
        $response = $this->getJson('/api/ticket/1');
        $response->assertOk();
        $this->assertEquals('[{"id":1,"preis":12,"reihe":12,"sitz":2,"kaufdatum":"2023-04-01","sprache":"Englisch","dimension":"3D","filmstart":"2023-04-05 18:30:00","film_id":null}]', $response->getContent());
    }

    public function testDelete(): void
    {
        $response = $this->deleteJson('/api/ticket/1');

        $response
            ->assertStatus(200);
            $this->assertEquals('erfolgreich gelöscht', $response->getContent());
    }

}
