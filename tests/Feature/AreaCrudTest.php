<?php

namespace Tests\Feature;

use App\Models\Area;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AreaCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_area_pages_render_with_local_records(): void
    {
        Area::create(['name' => 'Tecnología']);

        $this->get(route('area.create'))
            ->assertOk()
            ->assertSee('Tecnología');

        $this->get(route('area.index'))
            ->assertOk()
            ->assertSee('Tecnología');
    }

    public function test_area_can_be_created(): void
    {
        $this->post(route('area.store'), ['name' => 'Agricultura'])
            ->assertRedirect(route('area.index'))
            ->assertSessionHas('success', 'Área creada correctamente.');

        $this->assertDatabaseHas('area', ['name' => 'Agricultura']);
    }

    public function test_area_can_be_deleted(): void
    {
        $area = Area::create(['name' => 'Sistemas']);

        $this->delete(route('area.destroy', $area))
            ->assertRedirect(route('area.index'))
            ->assertSessionHas('success', 'Área eliminada correctamente.');

        $this->assertDatabaseMissing('area', ['id' => $area->id]);
    }
}
