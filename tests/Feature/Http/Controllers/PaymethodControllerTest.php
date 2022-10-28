<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Paymethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PaymethodController
 */
class PaymethodControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $paymethods = Paymethod::factory()->count(3)->create();

        $response = $this->get(route('paymethod.index'));

        $response->assertOk();
        $response->assertViewIs('paymethod.index');
        $response->assertViewHas('paymethods');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('paymethod.create'));

        $response->assertOk();
        $response->assertViewIs('paymethod.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymethodController::class,
            'store',
            \App\Http\Requests\PaymethodStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $description = $this->faker->text;

        $response = $this->post(route('paymethod.store'), [
            'description' => $description,
        ]);

        $paymethods = Paymethod::query()
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $paymethods);
        $paymethod = $paymethods->first();

        $response->assertRedirect(route('paymethod.index'));
        $response->assertSessionHas('paymethod.id', $paymethod->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $paymethod = Paymethod::factory()->create();

        $response = $this->get(route('paymethod.show', $paymethod));

        $response->assertOk();
        $response->assertViewIs('paymethod.show');
        $response->assertViewHas('paymethod');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $paymethod = Paymethod::factory()->create();

        $response = $this->get(route('paymethod.edit', $paymethod));

        $response->assertOk();
        $response->assertViewIs('paymethod.edit');
        $response->assertViewHas('paymethod');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymethodController::class,
            'update',
            \App\Http\Requests\PaymethodUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $paymethod = Paymethod::factory()->create();
        $description = $this->faker->text;

        $response = $this->put(route('paymethod.update', $paymethod), [
            'description' => $description,
        ]);

        $paymethod->refresh();

        $response->assertRedirect(route('paymethod.index'));
        $response->assertSessionHas('paymethod.id', $paymethod->id);

        $this->assertEquals($description, $paymethod->description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $paymethod = Paymethod::factory()->create();

        $response = $this->delete(route('paymethod.destroy', $paymethod));

        $response->assertRedirect(route('paymethod.index'));

        $this->assertDeleted($paymethod);
    }
}
