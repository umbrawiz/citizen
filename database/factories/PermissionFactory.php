<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Permission;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listPermission = [];
        $list = ['admin', 'A1', 'A2', 'A3', 'B1', 'B2'];

        $config = config('permission.list');
        if (!empty($config)) {
            foreach ($config as $key => $value) {
                foreach ($value as $k => $v) {
                    // $listPermission[] = [
                    //     'guard_name' => 'admin',
                    //     'name' => $v
                    // ];
                    foreach ($list as $keyList => $valueList) {
                        $listPermission[count($listPermission)]['guard_name'] = $valueList;
                        $listPermission[count($listPermission) - 1]['name'] = $v;
                    }
                }
            }
        }

        return $listPermission;
    }
}
