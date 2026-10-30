<?php

namespace Tests\Feature;

use App\Models\Area;
use App\Models\Computer;
use App\Models\TrainingCenter;
use App\Models\apprentice;
use App\Models\course;
use App\Models\teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AcademicFormsTest extends TestCase
{
    use RefreshDatabase;

    public function test_academic_form_pages_render_with_database_records(): void
    {
        $area = Area::create(['name' => 'Tecnología']);
        $trainingCenter = TrainingCenter::create([
            'name' => 'Centro de formación',
            'location' => 'Popayán',
        ]);
        $computer = Computer::create([
            'name' => 'Portátil',
            'brand' => 'Dell',
        ]);
        $course = course::create([
            'course_number' => '123456',
            'day' => 'Diurna',
            'area_id' => $area->id,
            'training_center_id' => $trainingCenter->id,
        ]);
        teacher::create([
            'name' => 'Instructor de prueba',
            'location' => 'Sede principal',
            'area_id' => $area->id,
            'training_center_id' => $trainingCenter->id,
        ]);
        apprentice::create([
            'name' => 'Aprendiz de prueba',
            'email' => 'aprendiz@example.com',
            'number' => '1001234567',
            'course_id' => $course->id,
            'computer_id' => $computer->id,
        ]);

        $this->get(route('course.create'))
            ->assertOk()
            ->assertSee('123456');
        $this->get(route('teacher.create'))
            ->assertOk()
            ->assertSee('Instructor de prueba');
        $this->get(route('apprentice.create'))
            ->assertOk()
            ->assertSee('Aprendiz de prueba');
    }

    public function test_courses_teachers_and_apprentices_can_be_created(): void
    {
        $area = Area::create(['name' => 'Tecnología']);
        $trainingCenter = TrainingCenter::create([
            'name' => 'Centro de formación',
            'location' => 'Popayán',
        ]);
        $computer = Computer::create([
            'name' => 'Portátil',
            'brand' => 'Dell',
        ]);

        $this->post(route('course.store'), [
            'course_number' => '234567',
            'day' => 'Diurna',
            'area_id' => $area->id,
            'training_center_id' => $trainingCenter->id,
        ])->assertRedirect(route('course.create'));

        $course = course::firstOrFail();

        $this->post(route('teacher.store'), [
            'name' => 'Instructor de prueba',
            'location' => 'Sede principal',
            'area_id' => $area->id,
            'training_center_id' => $trainingCenter->id,
        ])->assertRedirect(route('teacher.create'));

        $this->post(route('apprentice.store'), [
            'name' => 'Aprendiz de prueba',
            'email' => 'aprendiz@example.com',
            'number' => '1001234567',
            'course_id' => $course->id,
            'computer_id' => $computer->id,
        ])->assertRedirect(route('apprentice.create'));

        $this->assertDatabaseHas('courses', ['course_number' => '234567']);
        $this->assertDatabaseHas('teachers', ['name' => 'Instructor de prueba']);
        $this->assertDatabaseHas('apprentices', ['email' => 'aprendiz@example.com']);
    }
}
