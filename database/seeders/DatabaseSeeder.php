<?php

namespace Database\Seeders;

use App\Models\Pet;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\Categoryage;
use App\Models\Categorycolor;
use App\Models\Categorylocal;
use App\Models\Categoryvariety;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory()->create([
            'title' => 'Собаки',
        ]);

        Category::factory()->create([
            'title' => 'Коти',
        ]);

        Category::factory()->create([
            'title' => 'Гризуни',
        ]);

        Category::factory()->create([
            'title' => 'Рептилії',
        ]);

        Category::factory()->create([
            'title' => 'Інші',
        ]);


        Categorylocal::factory()->create([
            'title' => 'Київ',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Харків',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Одеса',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Дніпро',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Донецьк',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Запоріжжя',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Львів',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Кривий Ріг',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Миколаїв',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Маріуполь',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Луганськ',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Вінниця',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Херсон',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Полтава',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Чернігів',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Черкаси',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Хмельницький',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Житомир',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Суми',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Рівне',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Івано-Франківськ',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Тернопіль',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Луцьк',
        ]);
        
        Categorylocal::factory()->create([
            'title' => 'Ужгород',
        ]);
        
        
        Categorylocal::factory()->create([
            'title' => 'Інші',
        ]);



       



        Categoryvariety::factory()->create([
            'title' => 'Ссавці',
        ]);
        
        Categoryvariety::factory()->create([
            'title' => 'Птахи',
        ]);
        
        Categoryvariety::factory()->create([
            'title' => 'Рептилії',
        ]);
        
        Categoryvariety::factory()->create([
            'title' => 'Амфібії',
        ]);
        
        Categoryvariety::factory()->create([
            'title' => 'Риби',
        ]);
        
      
        
        Categoryvariety::factory()->create([
            'title' => 'Гризуни',
        ]);
      
        Categoryvariety::factory()->create([
            'title' => 'Інші',
        ]);




        Categorycolor::factory()->create([
            'title' => 'Біле',
        ]);

        Categorycolor::factory()->create([
            'title' => 'Чорне',
        ]);

        Categorycolor::factory()->create([
            'title' => 'Сіре',
        ]);

        Categorycolor::factory()->create([
            'title' => 'Коричневе',
        ]);

        Categorycolor::factory()->create([
            'title' => 'Кремове',
        ]);

        Categorycolor::factory()->create([
            'title' => 'Палеве',
        ]);

        Categorycolor::factory()->create([
            'title' => 'Рудовато коричневе',
        ]);
        
        Categorycolor::factory()->create([
            'title' => 'Інші',
        ]);


        Categoryage::factory()->create([
            'title' => 'днів',
        ]);

        Categoryage::factory()->create([
            'title' => 'тижнів',
        ]);


        Categoryage::factory()->create([
            'title' => 'місяців',
        ]);


        Categoryage::factory()->create([
            'title' => 'років',
        ]);
        

    }
}
