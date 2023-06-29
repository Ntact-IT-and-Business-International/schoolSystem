<?php

namespace App\Traits;

use App\Models\Shop;

trait CountShopItems
{
    /**
     * this function returns the total number of particular items
     */
    public static function countUnClassfiedShopItems($item_category_id)
    {
        return Shop::join('shop_items_categories', 'shop_items_categories.id', 'shops.item_category_id')
        ->whereItemCategoryId($item_category_id)
        ->whereDiscount(null)->whereClassification('unclassified')->count();
    }

    /**
     * this function returns the total number of particular items
     */
    public static function countBrandShopItems($item_category_id)
    {
        return Shop::join('shop_items_categories', 'shop_items_categories.id', 'shops.item_category_id')
        ->whereItemCategoryId($item_category_id)
        ->whereDiscount(null)->whereClassification('brand')->count();
    }
}
