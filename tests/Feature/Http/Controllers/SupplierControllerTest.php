<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SupplierController
 */
class SupplierControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $suppliers = Supplier::factory()->count(3)->create();

        $response = $this->get(route('supplier.index'));

        $response->assertOk();
        $response->assertViewIs('supplier.index');
        $response->assertViewHas('suppliers');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('supplier.create'));

        $response->assertOk();
        $response->assertViewIs('supplier.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SupplierController::class,
            'store',
            \App\Http\Requests\SupplierStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $company_name = $this->faker->word;
        $phone = $this->faker->phoneNumber;
        $website = $this->faker->word;

        $response = $this->post(route('supplier.store'), [
            'company_name' => $company_name,
            'phone' => $phone,
            'website' => $website,
        ]);

        $suppliers = Supplier::query()
            ->where('company_name', $company_name)
            ->where('phone', $phone)
            ->where('website', $website)
            ->get();
        $this->assertCount(1, $suppliers);
        $supplier = $suppliers->first();

        $response->assertRedirect(route('supplier.index'));
        $response->assertSessionHas('supplier.id', $supplier->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $supplier = Supplier::factory()->create();

        $response = $this->get(route('supplier.show', $supplier));

        $response->assertOk();
        $response->assertViewIs('supplier.show');
        $response->assertViewHas('supplier');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $supplier = Supplier::factory()->create();

        $response = $this->get(route('supplier.edit', $supplier));

        $response->assertOk();
        $response->assertViewIs('supplier.edit');
        $response->assertViewHas('supplier');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SupplierController::class,
            'update',
            \App\Http\Requests\SupplierUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $supplier = Supplier::factory()->create();
        $company_name = $this->faker->word;
        $phone = $this->faker->phoneNumber;
        $website = $this->faker->word;

        $response = $this->put(route('supplier.update', $supplier), [
            'company_name' => $company_name,
            'phone' => $phone,
            'website' => $website,
        ]);

        $supplier->refresh();

        $response->assertRedirect(route('supplier.index'));
        $response->assertSessionHas('supplier.id', $supplier->id);

        $this->assertEquals($company_name, $supplier->company_name);
        $this->assertEquals($phone, $supplier->phone);
        $this->assertEquals($website, $supplier->website);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $supplier = Supplier::factory()->create();

        $response = $this->delete(route('supplier.destroy', $supplier));

        $response->assertRedirect(route('supplier.index'));

        $this->assertDeleted($supplier);
    }
}
