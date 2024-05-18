<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Alert;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlertTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/alerts';
    protected string $tableName = 'alerts';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateAlert(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = Alert::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllAlertsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Alert::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(Alert::find(rand(1, 5))->name);
    }

    public function testViewAllAlertsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Alert::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateAlertValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewAlertData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Alert::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(Alert::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateAlert(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Alert::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteAlert(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Alert::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, Alert::count());
    }
    public function testRestoreAlert(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Alert::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->json('GET', $this->endpoint.'/1/restore')
             ->assertStatus(200);

        $this->assertDatabaseHas($this->tableName, [
            'id'         => 1,
            'deleted_at' => null,
        ]);
    }

    public function testPermanentAlert(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Alert::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->json('DELETE', $this->endpoint.'/1/permanent-delete')
             ->assertStatus(204);

        $this->assertDatabaseMissing($this->tableName, ['id' => 1]);
    }
}
