<?php

use App\Models\FieldCentre;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('field_centres', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("address");
            $table->string("maps");
            $table->string("facility");
            $table->string("phone_number");
            $table->integer("rating");
            $table->timestamps();
        });

        $faker = \Faker\Factory::create();;

        for ($i = 0; $i < 10; $i++) {
            FieldCentre::create([
                'name' => $faker->company,
                'address' => $faker->address,
                'maps' => 'https://maps.google.com/?q=' . $faker->latitude . ',' . $faker->longitude,
                'facility' => $faker->words(3, true),
                'phone_number' => $faker->phoneNumber,
                'rating' => $faker->numberBetween(1, 5),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_centres');
    }
};
