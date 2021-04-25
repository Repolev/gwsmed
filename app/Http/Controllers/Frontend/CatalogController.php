<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\CatalogCategory;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    /**
     * Show Catalog Category List
     */
    public function catalogCategory()
    {
        $catalog_category = CatalogCategory::where('parent_id', null)->get();
        return view('frontend.pages.catalog.category', compact('catalog_category'));
    }


    /**
     * Show Catalog Sub Cateogry
     */
    public function catalogSubcategory($category)
    {
        $parent = CatalogCategory::where('slug', $category)->first();
        $catalog_sub_cats = CatalogCategory::where('parent_id', $parent->id)->get();
        return view('frontend.pages.catalog.subcategory', compact('catalog_sub_cats'));
    }

    /**
     * Catalog List
     */
    public function catalogList($category, $subcategory)
    {
        $catalog_category = CatalogCategory::where('slug', $subcategory)->first();
        $catalogs = Catalog::where('category_id', $catalog_category->id)->get();
        return view('frontend.pages.catalog.catalogs');
    }

    /**
     * Show Catalog
     */
    public function catalog($subcategory, $slug){

    }
}
