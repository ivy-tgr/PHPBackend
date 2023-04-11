<?php

namespace Tests\Unit;
use Tests\TestCase;

class KinoControllerTest extends TestCase
{

    public function testCreate(): void
    {
        $response = $this->postJson('/api/kino', ['id'=> '1','name' => 'Hans',
        'kette' => 'Phate',
        'inbegriffen' => '1',
        'art' => '3D']);

       
        $response
            ->assertStatus(200);
            $this->assertEquals('erfolgreich gespeichert', $response->getContent());
    }

    public function testRead(): void
    {
    
        $response = $this->getJson('/api/kino/1');
        $response->assertOk();
        $this->assertEquals('[{"id":1,"name":"Hans","kette":"Phate","inbegriffen":1,"art":"3D","ticket_id":null}]', $response->getContent());
    }
/*
    public function testUpdate(): void
    {
        $response = $this->putJson('/api/kino', ['name' => 'Hans',
        'kette' => 'mega',
        'inbegriffen' => '1',
        'art' => '2D',]);
 
        $response
            ->assertStatus(200);
            $this->assertEquals('erfolgreich gespeichert', $response->getContent());
    }
*/
    public function testDelete(): void
    {
        $response = $this->deleteJson('/api/kino/1');

        $response
            ->assertStatus(200);
            $this->assertEquals('erfolgreich gelöscht', $response->getContent());
    }

}