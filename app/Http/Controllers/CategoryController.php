<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    public function index() {
        $categories = $this->getFormatCategories();

        $htmlCategories = "<ul>" . $this->viewCategories($categories, "") . "</ul>";
        $htmlProducts = $this->productsHTML();

        var_dump(serialize([]));

        return view('category.index', [
            "category" => $htmlCategories,
            "products" => $htmlProducts
        ]);
    }

    public function settingIndex() {
        $categories = $this->getFormatCategories();
        $categoryLayout = $this->editCategoriesHTML($categories, "");

        return view('category.setting', [
            "settingCategory" => $categoryLayout,

        ]);
    }

    public function settingSave(Request $request) {
        $sort = $request->input('sort');
        $sort = explode(",", $sort);
        $sort = array_map(function($a){
            $category = explode(":", $a);

            return [
                "id" => (int)$category[0],
                "title" => $category[1],
                "parent_id" => (int)$category[2],
                "categories" => [],
            ];
        }, $sort);

        $categories = $this->formatterCategories($sort);

        $file = file_get_contents(public_path() . "/../user_config/users.dat");
        $categoriesSerialize = unserialize($file);
        $categoriesSerialize[Auth::id()] = $categories;
        file_put_contents(public_path() . "/../user_config/users.dat", serialize($categoriesSerialize));

        return redirect()->action([__CLASS__, 'index']);
    }

    // service functions

    public function formatterCategories($categories, $formatCategories = []){
        foreach($categories as $category){

            if($category["parent_id"] === 0){
                $formatCategories[] = $category;
            } else {

                    foreach($formatCategories as $parentIndex => $elementParent){
                        if($elementParent["id"] === $category["parent_id"]){
                            $formatCategories[$parentIndex]["categories"][] = $category;
                        } else {

                            if(count($elementParent["categories"]) !== 0){
                                foreach($elementParent["categories"] as $childIndex => $childElement){

                                    if(is_array($childElement)){
                                        if($childElement["id"] === $category["parent_id"]){

                                            $formatCategories[$parentIndex]["categories"][$childIndex]["categories"][] = $category;
                                        }
                                    }
                                }
                            }

                        }
                    }
            }
        }

        return $formatCategories;
    }

    // functions get data

    public function getFormatCategories(){
        $file = file_get_contents(public_path() . "/../user_config/users.dat");
        $categoriesSerialize = unserialize($file);

        if(!empty($categoriesSerialize[Auth::id()])){
            return $categoriesSerialize[Auth::id()];
        }

        $categories = DB::table("categories")->orderBy("parent_id")->orderBy("id")->get();
        $sortCategories = [];

        foreach($categories as $category){
            $parent_id = $category->parent_id ?? 0;

            $sortCategories[] = [
                "id" => $category->id,
                "title" => $category->title,
                "parent_id" => $parent_id,
                "categories" => [],
            ];
        }

        return $this->formatterCategories($sortCategories);
    }


    // Generate HTML Code

    public function viewCategories($categories, $categoryLayout = ""){
        $categoryLayout .= "<ul>";
        foreach($categories as $i => $category){
            $id = $category["id"];
            $title = $category["title"];

            $categoryLayout .= "<li class='category-element' data-id='$id'>$title";

            if(count($category["categories"]) != 0){
                $categoryLayout .= "</li>";
                $categoryLayout .= $this->viewCategories($category["categories"]);

            } else {
                $categoryLayout .= "</li>";
            }
        }
        $categoryLayout .= "</ul>";

        return $categoryLayout;
    }

    public function editCategoriesHTML($array, $categoryLayout = ""){
        $categoryLayout .= "<div class='user-menu-sort-categories'>";

        foreach($array as $category){
            $id = $category["id"];
            $parent_id = $category["parent_id"] ?? "0";
            $title = $category["title"];

            $categoryLayout .= "<div class='user-menu-sort-category' data-id='$id' >";
            $categoryLayout .= "<p class='user-menu-sort-category__border' data-title='$title'>$title<span class='user-menu-hidden-element' hidden data-parent-id='$parent_id'></span></p>";

            if(count($category["categories"]) != 0){
                $categoryLayout .= $this->editCategoriesHTML($category["categories"]);
            }

            $categoryLayout .= "</div>";
        }
        $categoryLayout .= "</div>";

        return $categoryLayout;
    }

    public function productsHTML(): string{
        $products = Prod::all();
        $productsFilter = [];
        $productLayout = "";

        foreach($products as $product){
            $productsFilter[] = [
                "category_id" => $product->category_id,
                "fields" => $product->fields,
            ];
        }

        foreach($productsFilter as $product){
            $categoryId = $product["category_id"];
            $productItem = $product["fields"]["ГОСТ"];

            $productLayout .= "<span class='product-info' hidden data-category-id='$categoryId' data-product='$productItem'></span>";
        }

        return $productLayout;
    }
}
