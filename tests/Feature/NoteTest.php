<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NoteTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/notes';
    protected string $tableName = 'notes';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateNote(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = Note::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllNotesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Note::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(Note::find(rand(1, 5))->name);
    }

    public function testViewAllNotesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Note::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateNoteValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewNoteData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Note::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(Note::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateNote(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Note::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteNote(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Note::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, Note::count());
    }
    public function testRestoreNote(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Note::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->json('GET', $this->endpoint.'/1/restore')
             ->assertStatus(200);

        $this->assertDatabaseHas($this->tableName, [
            'id'         => 1,
            'deleted_at' => null,
        ]);
    }

    public function testPermanentNote(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Note::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->json('DELETE', $this->endpoint.'/1/permanent-delete')
             ->assertStatus(204);

        $this->assertDatabaseMissing($this->tableName, ['id' => 1]);
    }
}
