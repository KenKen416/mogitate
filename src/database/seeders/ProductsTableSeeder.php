<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Season;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
                [
                    'name' => 'キウイ',
                    'price' => 800,
                    'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです...',
                    'image' => 'images/kiwi.png',
                    'seasons' => ['秋', '冬']
                ],
                [
                    'name' => 'ストロベリー',
                    'price' => 1200,
                    'description' => '大人から子供まで大人気のストロベリー...',
                    'image' => 'images/strawberry.png',
                    'seasons' => ['春']
                ],
                [
                    'name' => 'オレンジ',
                    'price' => 850,
                    'description' => '酸味と甘みのバランスが抜群のネーブルオレンジ...',
                    'image' => 'images/orange.png',
                    'seasons' => ['冬']
                ],
                [
                    'name' => 'スイカ',
                    'price' => 700,
                    'description' => '甘くてシャリシャリ食感が魅力のスイカ...',
                    'image' => 'images/watermelon.png',
                    'seasons' => ['夏']
                ],
                [
                    'name' => 'ピーチ',
                    'price' => 1000,
                    'description' => '豊潤な香りととろけるような甘さが魅力のピーチ...',
                    'image' => 'images/peach.png',
                    'seasons' => ['夏']
                ],
                [
                    'name' => 'シャインマスカット',
                    'price' => 1400,
                    'description' => '爽やかな香りと上品な甘みが特長的なシャインマスカット...',
                    'image' => 'images/muscat.png',
                    'seasons' => ['夏', '秋']
                ],
                [
                    'name' => 'パイナップル',
                    'price' => 800,
                    'description' => '甘酸っぱさとトロピカルな香りが特徴のパイナップル...',
                    'image' => 'images/pineapple.png',
                    'seasons' => ['春', '夏']
                ],
                [
                    'name' => 'ブドウ',
                    'price' => 1100,
                    'description' => '国産の「巨峰」を使用したブドウ...',
                    'image' => 'images/grapes.png',
                    'seasons' => ['夏', '秋']
                ],
                [
                    'name' => 'バナナ',
                    'price' => 600,
                    'description' => '低カロリーで栄養満点のバナナ...',
                    'image' => 'images/banana.png',
                    'seasons' => ['夏']
                ],
                [
                    'name' => 'メロン',
                    'price' => 900,
                    'description' => 'ジューシーで品のある甘さのメロン...',
                    'image' => 'images/melon.png',
                    'seasons' => ['春', '夏']
                ]
        ];
        foreach($products as $data){
            $product = Product::create([
                'name'=>$data['name'],
                'price'=>$data['price'],
                'description'=>$data['description'],
                'image'=>$data['image'],
            ]);
        $seasonsIds = Season::whereIn('name',$data['seasons'])->pluck('id');
        $product->seasons()->attach($seasonsIds);
        };
    }
}
