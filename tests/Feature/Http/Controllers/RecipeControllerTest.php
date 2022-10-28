<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Recipe;
use App\Models\Recipecategory;
use App\Models\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RecipeController
 */
class RecipeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $recipes = Recipe::factory()->count(3)->create();

        $response = $this->get(route('recipe.index'));

        $response->assertOk();
        $response->assertViewIs('recipe.index');
        $response->assertViewHas('recipes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('recipe.create'));

        $response->assertOk();
        $response->assertViewIs('recipe.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipeController::class,
            'store',
            \App\Http\Requests\RecipeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $recipecategory = Recipecategory::factory()->create();
        $unit = Unit::factory()->create();
        $name = $this->faker->name;
        $price = $this->faker->randomFloat(/** decimal_attributes **/);
        $cost = $this->faker->randomFloat(/** decimal_attributes **/);
        $costpriceratio = $this->faker->randomFloat(/** decimal_attributes **/);
        $mc = $this->faker->randomFloat(/** decimal_attributes **/);
        $profit = $this->faker->randomFloat(/** decimal_attributes **/);
        $deliverycharge = $this->faker->randomFloat(/** decimal_attributes **/);
        $instock = $this->faker->boolean;
        $slug = $this->faker->slug;

        $response = $this->post(route('recipe.store'), [
            'recipecategory_id' => $recipecategory->id,
            'unit_id' => $unit->id,
            'name' => $name,
            'price' => $price,
            'cost' => $cost,
            'costpriceratio' => $costpriceratio,
            'mc' => $mc,
            'profit' => $profit,
            'deliverycharge' => $deliverycharge,
            'instock' => $instock,
            'slug' => $slug,
        ]);

        $recipes = Recipe::query()
            ->where('recipecategory_id', $recipecategory->id)
            ->where('unit_id', $unit->id)
            ->where('name', $name)
            ->where('price', $price)
            ->where('cost', $cost)
            ->where('costpriceratio', $costpriceratio)
            ->where('mc', $mc)
            ->where('profit', $profit)
            ->where('deliverycharge', $deliverycharge)
            ->where('instock', $instock)
            ->where('slug', $slug)
            ->get();
        $this->assertCount(1, $recipes);
        $recipe = $recipes->first();

        $response->assertRedirect(route('recipe.index'));
        $response->assertSessionHas('recipe.id', $recipe->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->get(route('recipe.show', $recipe));

        $response->assertOk();
        $response->assertViewIs('recipe.show');
        $response->assertViewHas('recipe');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->get(route('recipe.edit', $recipe));

        $response->assertOk();
        $response->assertViewIs('recipe.edit');
        $response->assertViewHas('recipe');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RecipeController::class,
            'update',
            \App\Http\Requests\RecipeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $recipe = Recipe::factory()->create();
        $recipecategory = Recipecategory::factory()->create();
        $unit = Unit::factory()->create();
        $name = $this->faker->name;
        $price = $this->faker->randomFloat(/** decimal_attributes **/);
        $cost = $this->faker->randomFloat(/** decimal_attributes **/);
        $costpriceratio = $this->faker->randomFloat(/** decimal_attributes **/);
        $mc = $this->faker->randomFloat(/** decimal_attributes **/);
        $profit = $this->faker->randomFloat(/** decimal_attributes **/);
        $deliverycharge = $this->faker->randomFloat(/** decimal_attributes **/);
        $instock = $this->faker->boolean;
        $slug = $this->faker->slug;

        $response = $this->put(route('recipe.update', $recipe), [
            'recipecategory_id' => $recipecategory->id,
            'unit_id' => $unit->id,
            'name' => $name,
            'price' => $price,
            'cost' => $cost,
            'costpriceratio' => $costpriceratio,
            'mc' => $mc,
            'profit' => $profit,
            'deliverycharge' => $deliverycharge,
            'instock' => $instock,
            'slug' => $slug,
        ]);

        $recipe->refresh();

        $response->assertRedirect(route('recipe.index'));
        $response->assertSessionHas('recipe.id', $recipe->id);

        $this->assertEquals($recipecategory->id, $recipe->recipecategory_id);
        $this->assertEquals($unit->id, $recipe->unit_id);
        $this->assertEquals($name, $recipe->name);
        $this->assertEquals($price, $recipe->price);
        $this->assertEquals($cost, $recipe->cost);
        $this->assertEquals($costpriceratio, $recipe->costpriceratio);
        $this->assertEquals($mc, $recipe->mc);
        $this->assertEquals($profit, $recipe->profit);
        $this->assertEquals($deliverycharge, $recipe->deliverycharge);
        $this->assertEquals($instock, $recipe->instock);
        $this->assertEquals($slug, $recipe->slug);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->delete(route('recipe.destroy', $recipe));

        $response->assertRedirect(route('recipe.index'));

        $this->assertDeleted($recipe);
    }
}
