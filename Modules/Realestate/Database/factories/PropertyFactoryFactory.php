<?php
namespace Modules\Realestate\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Realestate\Entities\PropertyFactory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

