<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            // Appetizers
            [
                'id' => (string) Str::uuid(),
                'name' => 'Bruschetta',
                'image_path' => '2024-10-28-bruchetta.jpeg',
                'image_url' => 'https://firebasestorage.googleapis.com/v0/b/randumucafe.appspot.com/o/new_food%2F2024-10-28-bruchetta.jpeg?alt=media&token=d229bffd-d506-4c6d-af78-efc5dbab6714',
                'description' => 'Toasted bread topped with tomatoes, garlic, and basil.',
                'type' => \App\Enums\MenuType::APPETIZER,
                'tag' => 'vegetarian, garlic',
                'price' => 28000,
                'enable' => true,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Spring Rolls',
                'image_path' => '2024-10-28-spring_rolls.jpg',
                'image_url' => 'https://firebasestorage.googleapis.com/v0/b/randumucafe.appspot.com/o/new_food%2F2024-10-28-spring-roll.jpeg?alt=media&token=6decb2d5-0915-4bfd-8ba2-bfaf0a20d4f4',
                'description' => 'Crispy rolls filled with vegetables.',
                'type' => \App\Enums\MenuType::APPETIZER,
                'tag' => 'vegan, crispy',
                'price' => 30000,
                'enable' => true,
            ],
            // Main Courses
            [
                'id' => (string) Str::uuid(),
                'name' => 'Grilled Chicken',
                'image_path' => '2024-10-28-grilled-chicken.jpeg',
                'image_url' => 'https://firebasestorage.googleapis.com/v0/b/randumucafe.appspot.com/o/new_food%2F2024-10-28-grilled-chicken.jpeg?alt=media&token=58376ae0-5691-4f3f-ab70-1755891e5f66',
                'description' => 'Juicy grilled chicken breast served with sides.',
                'type' => \App\Enums\MenuType::MAIN_COURSE,
                'tag' => 'gluten-free',
                'price' => 65000,
                'enable' => true,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Pasta Carbonara',
                'image_path' => '2024-10-28-pasta-carbonara.jpeg',
                'image_url' => 'https://firebasestorage.googleapis.com/v0/b/randumucafe.appspot.com/o/new_food%2F2024-10-28-pasta-carbonara.jpeg?alt=media&token=d45869f9-8301-4768-903e-160910a55215',
                'description' => 'Classic Italian pasta with a creamy sauce.',
                'type' => \App\Enums\MenuType::MAIN_COURSE,
                'tag' => 'contains dairy',
                'price' => 45000,
                'enable' => true,
            ],
            // Desserts
            [
                'id' => (string) Str::uuid(),
                'name' => 'Chocolate Lava Cake',
                'image_path' => '2024-10-28-chocolate-lava-cake.jpeg',
                'image_url' => 'https://firebasestorage.googleapis.com/v0/b/randumucafe.appspot.com/o/new_food%2F2024-10-28-chocolate-lava-cake.jpeg?alt=media&token=934b6fad-33ce-44e3-a944-1733c10a1df1',
                'description' => 'Warm chocolate cake with a molten center.',
                'type' => \App\Enums\MenuType::DESSERTS,
                'tag' => 'chocolate, hot',
                'price' => 30000,
                'enable' => true,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Cheesecake',
                'image_path' => '2024-10-28-cheesecake.jpeg',
                'image_url' => 'https://firebasestorage.googleapis.com/v0/b/randumucafe.appspot.com/o/new_food%2F2024-10-28-cheesecake.jpeg?alt=media&token=890327fb-2b69-4775-a304-cbf16adc2cf0',
                'description' => 'Classic creamy cheesecake with a graham cracker crust.',
                'type' => \App\Enums\MenuType::DESSERTS,
                'tag' => 'classic',
                'price' => 29000,
                'enable' => true,
            ],
            // Drinks
            [
                'id' => (string) Str::uuid(),
                'name' => 'Lemonade',
                'image_path' => '2024-10-28-lemonade.jpeg',
                'image_url' => 'https://firebasestorage.googleapis.com/v0/b/randumucafe.appspot.com/o/new_food%2F2024-10-28-lemonade.jpeg?alt=media&token=9fe6dc90-1008-4467-9fd2-e49fe38cd31c',
                'description' => 'Freshly squeezed lemonade, served cold.',
                'type' => \App\Enums\MenuType::DRINKS,
                'tag' => 'refreshing, cold',
                'price' => 18000,
                'enable' => true,
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Espresso',
                'image_path' => '2024-10-28-espresso.jpeg',
                'image_url' => 'https://firebasestorage.googleapis.com/v0/b/randumucafe.appspot.com/o/new_food%2F2024-10-28-espresso.jpeg?alt=media&token=a349e2b3-4438-4428-83f1-3f814823cf1f',
                'description' => 'Strong, bold coffee served hot.',
                'type' => \App\Enums\MenuType::DRINKS,
                'tag' => 'strong, hot',
                'price' => 20000,
                'enable' => true,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
