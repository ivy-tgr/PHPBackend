<?php

namespace Tests\Unit;
use Tests\TestCase;

class FilmControllerTest extends TestCase
{
    public function testCreate(): void
    {
        $response = $this->postJson('/api/film', ['id'=> '1','name' => 'Harry Potter',
        'altersfreigabe' => '12',
        'bewertung' => '9.3']);
       
        $response
            ->assertStatus(200);
            $this->assertEquals('erfolgreich gespeichert', $response->getContent());
    }

    public function testRead(): void
    {
    
        $response = $this->getJson('/api/film/1');
        $response->assertOk();
        $this->assertEquals('[{"id":1,"name":"Harry Potter","altersfreigabe":12,"bewertung":9.3}]', $response->getContent());
    }

    public function testDelete(): void
    {
        $response = $this->deleteJson('/api/film/1');

        $response
            ->assertStatus(200);
            $this->assertEquals('erfolgreich gelöscht', $response->getContent());
    }
}

