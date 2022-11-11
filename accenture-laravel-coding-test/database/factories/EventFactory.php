<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Event;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    protected $model = Event::class;

    public function definition()
    {
        return [
            'id'=>$this->faker->uuid,
            'name'=>$this->faker->name,
            'slug'=>$this->faker->slug,
            'createdAt'=> function(){
                return date('Y-m-d H:i:s', rand(0, time()));
            },
            'updatedAt'=> function(){
                return date('Y-m-d H:i:s', rand(0, time()));
            }
        ];
    }
}
