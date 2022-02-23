<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'শার্ট',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'টি-শার্ট',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'নরমাল প্যান্ট',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'জিন্স প্যান্ট',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'গ্যাবাডিং প্যান্ট',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'পাঞ্জাবি',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'পাইজামা',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'জুব্বা',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'ফতুয়া',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'লুঙ্গি',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'স্যান্ডো গেঞ্জি',
                'iron_rate' => 8,
                'iron_worker_rate' => 3,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Men's Clothing",
                
            ],
            [
                'name' => 'শেরওয়ানি',
                'iron_rate' => 50,
                'iron_worker_rate' => 10,
                'wash_rate' => 200,
                'wash_worker_rate' => 50,
                'category' => "Men's Clothing",
                
            ],




            [
                'name' => 'কোট',
                'iron_rate' => 70,
                'iron_worker_rate' => 20,
                'wash_rate' => 170,
                'wash_worker_rate' => 30,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'নর্মাল কোট',
                'iron_rate' => 30,
                'iron_worker_rate' => 10,
                'wash_rate' => 100,
                'wash_worker_rate' => 30,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'ব্লেজার',
                'iron_rate' => 70,
                'iron_worker_rate' => 20,
                'wash_rate' => 170,
                'wash_worker_rate' => 30,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'জ্যাকেট',
                'iron_rate' => 20,
                'iron_worker_rate' => 5,
                'wash_rate' => 100,
                'wash_worker_rate' => 30,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'হাফ সােয়েটার',
                'iron_rate' => 10,
                'iron_worker_rate' => 4,
                'wash_rate' => 50,
                'wash_worker_rate' => 15,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'ফুল সােয়েটার',
                'iron_rate' => 15,
                'iron_worker_rate' => 4,
                'wash_rate' => 70,
                'wash_worker_rate' => 20,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'নর্মাল সােয়েটার',
                'iron_rate' => 10,
                'iron_worker_rate' => 4,
                'wash_rate' => 30,
                'wash_worker_rate' => 10,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'ওয়াশকোর্ট/কোটি',
                'iron_rate' => 20,
                'iron_worker_rate' => 5,
                'wash_rate' => 50,
                'wash_worker_rate' => 15,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'মাফলার',
                'iron_rate' => 10,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'ট্যাই',
                'iron_rate' => 10,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'শাল/চাদর',
                'iron_rate' => 20,
                'iron_worker_rate' => 5,
                'wash_rate' => 100,
                'wash_worker_rate' => 15,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'হুডি',
                'iron_rate' => 10,
                'iron_worker_rate' => 4,
                'wash_rate' => 30,
                'wash_worker_rate' => 10,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'টুপি',
                'iron_rate' => 10,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Winter Clothing",
                
            ],
            [
                'name' => 'কমপ্লিট স্যুট',
                'iron_rate' => 80,
                'iron_worker_rate' => 25,
                'wash_rate' => 200,
                'wash_worker_rate' => 40,
                'category' => "Winter Clothing",
                
            ],




            [
                'name' => 'কামিজ',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'ওড়না',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'লেডিস পাইজামা',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'সেমিজ',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'লেডিস টি-শার্ট',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'লেডিস শার্ট',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'লেডিস জিন্স প্যান্ট',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'লেডিস হুডি',
                'iron_rate' => 10,
                'iron_worker_rate' => 4,
                'wash_rate' => 30,
                'wash_worker_rate' => 10,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'সূতি শাড়ি',
                'iron_rate' => 25,
                'iron_worker_rate' => 7,
                'wash_rate' => 50,
                'wash_worker_rate' => 10,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'সিল্ক শাড়ি',
                'iron_rate' => 30,
                'iron_worker_rate' => 7,
                'wash_rate' => 100,
                'wash_worker_rate' => 15,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'জামদানি শাড়ি',
                'iron_rate' => 30,
                'iron_worker_rate' => 7,
                'wash_rate' => 150,
                'wash_worker_rate' => 20,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'ব্যানারসি/কাতান শাড়ি',
                'iron_rate' => 40,
                'iron_worker_rate' => 10,
                'wash_rate' => 200,
                'wash_worker_rate' => 30,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'জরজেট/তশর শাড়ি',
                'iron_rate' => 30,
                'iron_worker_rate' => 7,
                'wash_rate' => 100,
                'wash_worker_rate' => 15,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'টিস্যু শাড়ি',
                'iron_rate' => 30,
                'iron_worker_rate' => 7,
                'wash_rate' => 150,
                'wash_worker_rate' => 20,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'বিয়ের শাড়ি',
                'iron_rate' => 50,
                'iron_worker_rate' => 10,
                'wash_rate' => 300,
                'wash_worker_rate' => 40,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'ল্যাহেঙ্গা শাড়ি',
                'iron_rate' => 40,
                'iron_worker_rate' => 10,
                'wash_rate' => 200,
                'wash_worker_rate' => 30,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'ব্লাউজ',
                'iron_rate' => 6,
                'iron_worker_rate' => 2.5,
                'wash_rate' => 20,
                'wash_worker_rate' => 6,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'জিপসি',
                'iron_rate' => 15,
                'iron_worker_rate' => 5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'ল্যাহেঙ্গা',
                'iron_rate' => 30,
                'iron_worker_rate' => 6,
                'wash_rate' => 100,
                'wash_worker_rate' => 20,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'বােরখা',
                'iron_rate' => 10,
                'iron_worker_rate' => 4,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'হিজাব/স্কার্ফ',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'স্কুল ড্রেস সেট',
                'iron_rate' => 25,
                'iron_worker_rate' => 10,
                'wash_rate' => 50,
                'wash_worker_rate' => 15,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'কলেজ ড্রেস সেট',
                'iron_rate' => 25,
                'iron_worker_rate' => 10,
                'wash_rate' => 50,
                'wash_worker_rate' => 15,
                'category' => "Women's Clothing",
                
            ],
            [
                'name' => 'পেটিকোট',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Women's Clothing",
                
            ],
            

            [
                'name' => 'লেডিস কোর্ট',
                'iron_rate' => 50,
                'iron_worker_rate' => 15,
                'wash_rate' => 150,
                'wash_worker_rate' => 30,
                'category' => "Women",
                
            ],
            [
                'name' => 'লেডিস জ্যাকেট',
                'iron_rate' => 20,
                'iron_worker_rate' => 6,
                'wash_rate' => 100,
                'wash_worker_rate' => 30,
                'category' => "Women",
                
            ],
            [
                'name' => 'লেডিস সােয়েটার',
                'iron_rate' => 15,
                'iron_worker_rate' => 5,
                'wash_rate' => 80,
                'wash_worker_rate' => 20,
                'category' => "Women",
                
            ],
            [
                'name' => 'লেডিস শাল/চাদর',
                'iron_rate' => 15,
                'iron_worker_rate' => 5,
                'wash_rate' => 80,
                'wash_worker_rate' => 20,
                'category' => "Women",
                
            ],
            [
                'name' => 'এপ্রন',
                'iron_rate' => 8,
                'iron_worker_rate' => 3.5,
                'wash_rate' => 30,
                'wash_worker_rate' => 8,
                'category' => "Women",
                
            ],

                        

            [
                'name' => 'বেড সিট/বিছনার চাদর',
                'iron_rate' => 20,
                'iron_worker_rate' => 6,
                'wash_rate' => 40,
                'wash_worker_rate' => 10,
                'category' => "Others",
                
            ],
            [
                'name' => 'বেড কভার/বালিশের কভার',
                'iron_rate' => 6,
                'iron_worker_rate' => 2.5,
                'wash_rate' => 20,
                'wash_worker_rate' => 6,
                'category' => "Others",
                
            ],
            [
                'name' => 'সােফার কভার',
                'iron_rate' => 8,
                'iron_worker_rate' => 3,
                'wash_rate' => 25,
                'wash_worker_rate' => 7,
                'category' => "Others",
                
            ],
            [
                'name' => 'কুসন/পিলাে কভার',
                'iron_rate' => 5,
                'iron_worker_rate' => 2,
                'wash_rate' => 20,
                'wash_worker_rate' => 6,
                'category' => "Others",
                
            ],
            [
                'name' => 'মসারি',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 50,
                'wash_worker_rate' => 15,
                'category' => "Others",
                
            ],
            [
                'name' => 'পর্দা',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 0,
                'wash_worker_rate' => 0,
                'category' => "Others",
                
            ],
            [
                'name' => 'তােয়ালে',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 25,
                'wash_worker_rate' => 8,
                'category' => "Others",
                
            ],
            [
                'name' => 'জাইনামাজ',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 100,
                'wash_worker_rate' => 20,
                'category' => "Others",
                
            ],
            [
                'name' => 'রেইন কোট',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 100,
                'wash_worker_rate' => 20,
                'category' => "Others",
                
            ],
            [
                'name' => 'স্কুল ব্যাগ',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 100,
                'wash_worker_rate' => 30,
                'category' => "Others",
                
            ],
            [
                'name' => 'ম্যাট/কার্পেট',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 0,
                'wash_worker_rate' => 0,
                'category' => "Others",
                
            ],
            [
                'name' => 'বাইক কভার',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 150,
                'wash_worker_rate' => 50,
                'category' => "Others",
                
            ],
            [
                'name' => 'কার কভার',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 500,
                'wash_worker_rate' => 200,
                'category' => "Others",
                
            ],
            [
                'name' => 'জাঙ্গিয়া/আন্ডার প্যান্ট',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 10,
                'wash_worker_rate' => 5,
                'category' => "Others",
                
            ],
            [
                'name' => 'মুজা',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 10,
                'wash_worker_rate' => 5,
                'category' => "Others",
                
            ],
            [
                'name' => 'অনান্য',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 0,
                'wash_worker_rate' => 0,
                'category' => "Others",
                
            ],

            [
                'name' => 'ডাবল কম্বল',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 400,
                'wash_worker_rate' => 150,
                'category' => "Blanket",
                
            ],
            [
                'name' => 'সিঙ্গেল কম্বল',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 300,
                'wash_worker_rate' => 130,
                'category' => "Blanket",
                
            ],
            [
                'name' => 'বেবি কম্বল',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 100,
                'wash_worker_rate' => 40,
                'category' => "Blanket",
                
            ],
            [
                'name' => 'কমফোর্ট',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 200,
                'wash_worker_rate' => 100,
                'category' => "Blanket",
                
            ],
            [
                'name' => 'কাঁথা',
                'iron_rate' => 0,
                'iron_worker_rate' => 0,
                'wash_rate' => 50,
                'wash_worker_rate' => 15,
                'category' => "Blanket",
                
            ],
            [
                'name' => 'লেপ কভার',
                'iron_rate' => 20,
                'iron_worker_rate' => 6,
                'wash_rate' => 50,
                'wash_worker_rate' => 15,
                'category' => "Blanket",
                
            ],





            [
                'name' => 'সূতি পর্দা A গ্রেড',
                'iron_rate' => 20,
                'iron_worker_rate' => 7,
                'wash_rate' => 40,
                'wash_worker_rate' => 15,
                'category' => "Curtains",
                
            ],
            [
                'name' => 'সূতি পর্দা B গ্রেড',
                'iron_rate' => 15,
                'iron_worker_rate' => 5,
                'wash_rate' => 35,
                'wash_worker_rate' => 12,
                'category' => "Curtains",
                
            ],
            [
                'name' => 'সূতি পর্দা C গ্রেড',
                'iron_rate' => 10,
                'iron_worker_rate' => 5,
                'wash_rate' => 30,
                'wash_worker_rate' => 10,
                'category' => "Curtains",
                
            ],
            [
                'name' => 'ফ্ল্যাট সূতি পর্দা',
                'iron_rate' => 25,
                'iron_worker_rate' => 7,
                'wash_rate' => 40,
                'wash_worker_rate' => 15,
                'category' => "Curtains",
                
            ],
            [
                'name' => 'আইলেট পর্দা A গ্রেড',
                'iron_rate' => 25,
                'iron_worker_rate' => 7,
                'wash_rate' => 50,
                'wash_worker_rate' => 15,
                'category' => "Curtains",
                
            ],
            [
                'name' => 'আইলেট পর্দা B গ্রেড',
                'iron_rate' => 20,
                'iron_worker_rate' => 7,
                'wash_rate' => 40,
                'wash_worker_rate' => 12,
                'category' => "Curtains",
                
            ],
            [
                'name' => 'আইলেট পর্দা C গ্রেড',
                'iron_rate' => 15,
                'iron_worker_rate' => 5,
                'wash_rate' => 35,
                'wash_worker_rate' => 10,
                'category' => "Curtains",
                
            ],
            [
                'name' => 'ফ্ল্যাট আইলেট পর্দা',
                'iron_rate' => 30,
                'iron_worker_rate' => 10,
                'wash_rate' => 50,
                'wash_worker_rate' => 15,
                'category' => "Curtains",
                
            ],
        ]);
    }
}
