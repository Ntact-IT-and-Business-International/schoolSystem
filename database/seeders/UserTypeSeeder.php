<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Admin', 'Student', 'Director', 'Headteacher', 'Deputy Headteacher', 'Deputy Headteacher Academics','Deputy Headteacher Adminstration','Dos', 'Head of Department', 'Matron', 'Security', 'Cleaner', 'Cooks'];

        for ($i = 0; $i < count($categories); $i++) {
            $cat = new UserType();
            if (UserType::where('id', $i)->exists()) {
                $cat->id = $i + 1;
            } else {
                $cat->id = $i;
            }
            $cat->category = $categories[$i];
            $cat->save();
        }
    }
}
