<?php

use Faker\Factory;
use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Collection;
use Phinx\Seed\AbstractSeed;
use SONFin\Models\CategoryCost;

class BillPaysSeeder extends AbstractSeed
{
    /**
     * @var Collection
     */
    private $categories;

    public function run()
    {
        require_once __DIR__ . '/../bootstrap.php';
        $this->categories = CategoryCost::all();

        $faker = Factory::create('pt_BR');
        $faker->addProvider($this);
        $billPays = $this->table('bill_pays');
        $data = [];
        foreach (range(1, 10) as $value) {
            $userId = rand(1, 4);
            $data[] =
                [
                    'date_launch'       => $faker->dateTimeBetween('-1 month')->format('Y-m-d'),
                    'name'              => $faker->word,
                    'value'             => $faker->randomFloat(2, 10, 1000),
                    'user_id'           => $userId,
                    'category_cost_id'  => $faker->categoryId($userId),
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s')
                ];
        }
        $billPays->insert($data)->save();
    }

    public function categoryId($userId)
    {
        $categories = $this->categories->where('user_id', $userId);
        $categories = $categories->pluck('id');
        return Base::randomElement($categories->toArray());
    }
}
