<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Dish;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DishController
 */
class DishControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $dishes = Dish::factory()->count(3)->create();

        $response = $this->get(route('dish.index'));

        $response->assertOk();
        $response->assertViewIs('dish.index');
        $response->assertViewHas('dishes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('dish.create'));

        $response->assertOk();
        $response->assertViewIs('dish.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DishController::class,
            'store',
            \App\Http\Requests\DishStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $servtime = $this->faker->randomNumber();
        $price = $this->faker->randomFloat(/** decimal_attributes **/);
        $cost = $this->faker->randomFloat(/** decimal_attributes **/);
        $costpriceratio = $this->faker->randomFloat(/** decimal_attributes **/);
        $mc = $this->faker->randomFloat(/** decimal_attributes **/);
        $profit = $this->faker->randomFloat(/** decimal_attributes **/);
        $deliverycharge = $this->faker->randomFloat(/** decimal_attributes **/);
        $instock = $this->faker->boolean;

        $response = $this->post(route('dish.store'), [
            'name' => $name,
            'servtime' => $servtime,
            'price' => $price,
            'cost' => $cost,
            'costpriceratio' => $costpriceratio,
            'mc' => $mc,
            'profit' => $profit,
            'deliverycharge' => $deliverycharge,
            'instock' => $instock,
        ]);

        $dishes = Dish::query()
            ->where('name', $name)
            ->where('servtime', $servtime)
            ->where('price', $price)
            ->where('cost', $cost)
            ->where('costpriceratio', $costpriceratio)
            ->where('mc', $mc)
            ->where('profit', $profit)
            ->where('deliverycharge', $deliverycharge)
            ->where('instock', $instock)
            ->get();
        $this->assertCount(1, $dishes);
        $dish = $dishes->first();

        $response->assertRedirect(route('dish.index'));
        $response->assertSessionHas('dish.id', $dish->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $dish = Dish::factory()->create();

        $response = $this->get(route('dish.show', $dish));

        $response->assertOk();
        $response->assertViewIs('dish.show');
        $response->assertViewHas('dish');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $dish = Dish::factory()->create();

        $response = $this->get(route('dish.edit', $dish));

        $response->assertOk();
        $response->assertViewIs('dish.edit');
        $response->assertViewHas('dish');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DishController::class,
            'update',
            \App\Http\Requests\DishUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $dish = Dish::factory()->create();
        $name = $this->faker->name;
        $servtime = $this->faker->randomNumber();
        $price = $this->faker->randomFloat(/** decimal_attributes **/);
        $cost = $this->faker->randomFloat(/** decimal_attributes **/);
        $costpriceratio = $this->faker->randomFloat(/** decimal_attributes **/);
        $mc = $this->faker->randomFloat(/** decimal_attributes **/);
        $profit = $this->faker->randomFloat(/** decimal_attributes **/);
        $deliverycharge = $this->faker->randomFloat(/** decimal_attributes **/);
        $instock = $this->faker->boolean;

        $response = $this->put(route('dish.update', $dish), [
            'name' => $name,
            'servtime' => $servtime,
            'price' => $price,
            'cost' => $cost,
            'costpriceratio' => $costpriceratio,
            'mc' => $mc,
            'profit' => $profit,
            'deliverycharge' => $deliverycharge,
            'instock' => $instock,
        ]);

        $dish->refresh();

        $response->assertRedirect(route('dish.index'));
        $response->assertSessionHas('dish.id', $dish->id);

        $this->assertEquals($name, $dish->name);
        $this->assertEquals($servtime, $dish->servtime);
        $this->assertEquals($price, $dish->price);
        $this->assertEquals($cost, $dish->cost);
        $this->assertEquals($costpriceratio, $dish->costpriceratio);
        $this->assertEquals($mc, $dish->mc);
        $this->assertEquals($profit, $dish->profit);
        $this->assertEquals($deliverycharge, $dish->deliverycharge);
        $this->assertEquals($instock, $dish->instock);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $dish = Dish::factory()->create();

        $response = $this->delete(route('dish.destroy', $dish));

        $response->assertRedirect(route('dish.index'));

        $this->assertDeleted($dish);
    }
}
