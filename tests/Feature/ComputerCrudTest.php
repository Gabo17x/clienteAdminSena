<?php

namespace Tests\Feature;

use App\Models\Computer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComputerCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_computer_pages_render_with_local_records(): void
    {
        Computer::create([
            'name' => 'EQ-001',
            'brand' => 'Lenovo',
        ]);

        $this->get(route('computer.index'))
            ->assertOk()
            ->assertSee('EQ-001')
            ->assertSee('Lenovo');

        $this->get(route('computer.create'))
            ->assertOk()
            ->assertSee('EQ-001');
    }

    public function test_computer_can_be_created(): void
    {
        $this->post(route('computer.store'), [
            'name' => 'EQ-002',
            'brand' => 'HP',
        ])
            ->assertRedirect(route('computer.index'))
            ->assertSessionHas('success', 'Computador registrado correctamente.');

        $this->assertDatabaseHas('computer', [
            'name' => 'EQ-002',
            'brand' => 'HP',
        ]);
    }

    public function test_computer_can_be_deleted(): void
    {
        $computer = Computer::create([
            'name' => 'EQ-003',
            'brand' => 'Dell',
        ]);

        $this->delete(route('computer.destroy', $computer))
            ->assertRedirect(route('computer.index'))
            ->assertSessionHas('success', 'Computador eliminado correctamente.');

        $this->assertDatabaseMissing('computer', ['id' => $computer->id]);
    }
}
