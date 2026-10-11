<?php

namespace Tests\Feature;

use App\Models\TrainingCenter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrainingCenterCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_training_center_pages_render_with_local_records(): void
    {
        TrainingCenter::create([
            'name' => 'CTPI',
            'location' => 'Popayán',
        ]);

        $this->get(route('training_center.index'))
            ->assertOk()
            ->assertSee('CTPI')
            ->assertSee('Popayán');

        $this->get(route('training_center.create'))
            ->assertOk()
            ->assertSee('CTPI');
    }

    public function test_training_center_can_be_created(): void
    {
        $this->post(route('training_center.store'), [
            'name' => 'CTPI',
            'location' => 'Popayán',
        ])
            ->assertRedirect(route('training_center.index'))
            ->assertSessionHas('success', 'Centro de formación creado correctamente.');

        $this->assertDatabaseHas('training_center', [
            'name' => 'CTPI',
            'location' => 'Popayán',
        ]);
    }

    public function test_training_center_can_be_deleted(): void
    {
        $trainingCenter = TrainingCenter::create([
            'name' => 'CTPI',
            'location' => 'Popayán',
        ]);

        $this->delete(route('training_center.destroy', $trainingCenter))
            ->assertRedirect(route('training_center.index'))
            ->assertSessionHas('success', 'Centro de formación eliminado correctamente.');

        $this->assertDatabaseMissing('training_center', ['id' => $trainingCenter->id]);
    }
}
