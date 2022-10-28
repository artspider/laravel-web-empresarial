<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Recipecategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RecipecategoryController
 */
class RecipecategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $recipecategories = Recipecategory::factory()->count(3)->create();

        $response = $this->get(route('recipecategory.index'));

        $response->assertOk();
        $response->assertViewIs('recipecategory.index');
        $response->assertViewHas('recipecategories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('recipecategory.create'));

        $response->assertOk();
        $response->assertViewIs('recipecategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipecategoryController::class,
            'store',
            \App\Http\Requests\RecipecategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('recipecategory.store'), [
            'name' => $name,
        ]);

        $recipecategories = Recipecategory::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $recipecategories);
        $recipecategory = $recipecategories->first();

        $response->assertRedirect(route('recipecategory.index'));
        $response->assertSessionHas('recipecategory.id', $recipecategory->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $recipecategory = Recipecategory::factory()->create();

        $response = $this->get(route('recipecategory.show', $recipecategory));

        $response->assertOk();
        $response->assertViewIs('recipecategory.show');
        $response->assertViewHas('recipecategory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $recipecategory = Recipecategory::factory()->create();

        $response = $this->get(route('recipecategory.edit', $recipecategory));

        $response->assertOk();
        $response->assertViewIs('recipecategory.edit');
        $response->assertViewHas('recipecategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipecategoryController::class,
            'update',
            \App\Http\Requests\RecipecategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $recipecategory = Recipecategory::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('recipecategory.update', $recipecategory), [
            'name' => $name,
        ]);

        $recipecategory->refresh();

        $response->assertRedirect(route('recipecategory.index'));
        $response->assertSessionHas('recipecategory.id', $recipecategory->id);

        $this->assertEquals($name, $recipecategory->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $recipecategory = Recipecategory::factory()->create();

        $response = $this->delete(route('recipecategory.destroy', $recipecategory));

        $response->assertRedirect(route('recipecategory.index'));

        $this->assertDeleted($recipecategory);
    }
}
