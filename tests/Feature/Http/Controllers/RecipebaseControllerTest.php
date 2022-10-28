<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Recipe;
use App\Models\Recipebase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RecipebaseController
 */
class RecipebaseControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $recipebases = Recipebase::factory()->count(3)->create();

        $response = $this->get(route('recipebase.index'));

        $response->assertOk();
        $response->assertViewIs('recipebase.index');
        $response->assertViewHas('recipebases');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('recipebase.create'));

        $response->assertOk();
        $response->assertViewIs('recipebase.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipebaseController::class,
            'store',
            \App\Http\Requests\RecipebaseStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $recipe = Recipe::factory()->create();
        $qty = $this->faker->randomFloat(/** decimal_attributes **/);
        $qtyleft = $this->faker->randomFloat(/** decimal_attributes **/);

        $response = $this->post(route('recipebase.store'), [
            'recipe_id' => $recipe->id,
            'qty' => $qty,
            'qtyleft' => $qtyleft,
        ]);

        $recipebases = Recipebase::query()
            ->where('recipe_id', $recipe->id)
            ->where('qty', $qty)
            ->where('qtyleft', $qtyleft)
            ->get();
        $this->assertCount(1, $recipebases);
        $recipebase = $recipebases->first();

        $response->assertRedirect(route('recipebase.index'));
        $response->assertSessionHas('recipebase.id', $recipebase->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $recipebase = Recipebase::factory()->create();

        $response = $this->get(route('recipebase.show', $recipebase));

        $response->assertOk();
        $response->assertViewIs('recipebase.show');
        $response->assertViewHas('recipebase');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $recipebase = Recipebase::factory()->create();

        $response = $this->get(route('recipebase.edit', $recipebase));

        $response->assertOk();
        $response->assertViewIs('recipebase.edit');
        $response->assertViewHas('recipebase');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipebaseController::class,
            'update',
            \App\Http\Requests\RecipebaseUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $recipebase = Recipebase::factory()->create();
        $recipe = Recipe::factory()->create();
        $qty = $this->faker->randomFloat(/** decimal_attributes **/);
        $qtyleft = $this->faker->randomFloat(/** decimal_attributes **/);

        $response = $this->put(route('recipebase.update', $recipebase), [
            'recipe_id' => $recipe->id,
            'qty' => $qty,
            'qtyleft' => $qtyleft,
        ]);

        $recipebase->refresh();

        $response->assertRedirect(route('recipebase.index'));
        $response->assertSessionHas('recipebase.id', $recipebase->id);

        $this->assertEquals($recipe->id, $recipebase->recipe_id);
        $this->assertEquals($qty, $recipebase->qty);
        $this->assertEquals($qtyleft, $recipebase->qtyleft);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $recipebase = Recipebase::factory()->create();

        $response = $this->delete(route('recipebase.destroy', $recipebase));

        $response->assertRedirect(route('recipebase.index'));

        $this->assertDeleted($recipebase);
    }
}
