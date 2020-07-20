<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewProjectsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function view_all_projects_on_home_page()
    {
        factory(Project::class)->create(['name' => 'my-awesome-project']);
        factory(Project::class)->state('ignored')->create(['name' => 'my-ignored-project']);

        $this->get(route('project.index'))
            ->assertSeeText('my-awesome-project')
            ->assertDontSeeText('my-ignored-project');
    }

    /** @test */
    function view_ignored_projects_on_ignored_page()
    {
        factory(Project::class)->state('ignored')->create(['name' => 'my-ignored-project']);
        factory(Project::class)->create(['name' => 'my-awesome-project']);

        $this->get(route('ignored.index'))
            ->assertSeeText('my-ignored-project')
            ->assertDontSeeText('my-awesome-project');
    }
}
