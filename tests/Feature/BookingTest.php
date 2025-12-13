<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Table;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_toggle_status_from_empty_to_filled()
    {
        $this->actingAs(User::factory()->create());
        $table = Table::factory()->create(['table_number' => 1]);

        $response = $this->patch(route('bookings.toggleStatus', $table->id));

        $response->assertRedirect();
        
        $this->assertDatabaseHas('bookings', [
            'table_id' => $table->id,
            'status' => 'filled'
        ]);
    }

    /** @test */
    public function test_toggle_status_from_filled_to_empty()
    {
        $this->actingAs(User::factory()->create());

        $table = Table::factory()->create();
        $booking = Booking::factory()->create([
            'table_id' => $table->id,
            'status' => 'filled'
        ]);

        $response = $this->patch(route('bookings.toggleStatus', $table->id));

        $response->assertRedirect();

        $this->assertEquals('empty', $booking->fresh()->status);
    }
}
