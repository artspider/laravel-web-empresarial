<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\OrderController
 */
class OrderControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $orders = Order::factory()->count(3)->create();

        $response = $this->get(route('order.index'));

        $response->assertOk();
        $response->assertViewIs('order.index');
        $response->assertViewHas('orders');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('order.create'));

        $response->assertOk();
        $response->assertViewIs('order.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderController::class,
            'store',
            \App\Http\Requests\OrderStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $customer = Customer::factory()->create();
        $user = User::factory()->create();
        $note = $this->faker->text;
        $payed = $this->faker->boolean;
        $total = $this->faker->randomFloat(/** decimal_attributes **/);

        $response = $this->post(route('order.store'), [
            'customer_id' => $customer->id,
            'user_id' => $user->id,
            'note' => $note,
            'payed' => $payed,
            'total' => $total,
        ]);

        $orders = Order::query()
            ->where('customer_id', $customer->id)
            ->where('user_id', $user->id)
            ->where('note', $note)
            ->where('payed', $payed)
            ->where('total', $total)
            ->get();
        $this->assertCount(1, $orders);
        $order = $orders->first();

        $response->assertRedirect(route('order.index'));
        $response->assertSessionHas('order.id', $order->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $order = Order::factory()->create();

        $response = $this->get(route('order.show', $order));

        $response->assertOk();
        $response->assertViewIs('order.show');
        $response->assertViewHas('order');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $order = Order::factory()->create();

        $response = $this->get(route('order.edit', $order));

        $response->assertOk();
        $response->assertViewIs('order.edit');
        $response->assertViewHas('order');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderController::class,
            'update',
            \App\Http\Requests\OrderUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $order = Order::factory()->create();
        $customer = Customer::factory()->create();
        $user = User::factory()->create();
        $note = $this->faker->text;
        $payed = $this->faker->boolean;
        $total = $this->faker->randomFloat(/** decimal_attributes **/);

        $response = $this->put(route('order.update', $order), [
            'customer_id' => $customer->id,
            'user_id' => $user->id,
            'note' => $note,
            'payed' => $payed,
            'total' => $total,
        ]);

        $order->refresh();

        $response->assertRedirect(route('order.index'));
        $response->assertSessionHas('order.id', $order->id);

        $this->assertEquals($customer->id, $order->customer_id);
        $this->assertEquals($user->id, $order->user_id);
        $this->assertEquals($note, $order->note);
        $this->assertEquals($payed, $order->payed);
        $this->assertEquals($total, $order->total);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $order = Order::factory()->create();

        $response = $this->delete(route('order.destroy', $order));

        $response->assertRedirect(route('order.index'));

        $this->assertDeleted($order);
    }
}
