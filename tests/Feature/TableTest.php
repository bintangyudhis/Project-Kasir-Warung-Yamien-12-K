<?php

namespace Tests\Feature;

use App\Models\Table;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_admin_can_view_admin_tables()
    {
        $admin = User::factory()->admin()->create();
        $this->actingAs($admin);
        
        Table::factory()->create();

        $response = $this->get(route('tables.index'));

        $response->assertStatus(200);
        $response->assertViewIs('tables.index'); 
    }

    /** @test */
    public function test_cashier_can_view_cashier_tables()
    {
        $cashier = User::factory()->cashier()->create();
        $this->actingAs($cashier);
        
        Table::factory()->create();

        $response = $this->get(route('tables.index'));

        $response->assertStatus(200);
        $response->assertViewIs('kasir.table.index'); 
    }

    /** @test */
    public function test_admin_can_create_new_table()
    {
        $this->actingAs(User::factory()->admin()->create());

        $response = $this->post(route('tables.store'), [
            'table_number' => 50,
            'capacity' => 4
        ]);

        $response->assertRedirect(route('tables.index'));
        $this->assertDatabaseHas('tables', ['table_number' => 50]);
    }
}
