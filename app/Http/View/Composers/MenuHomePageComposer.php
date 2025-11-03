<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Banner;
use App\Model\Admin\Category;
use App\Model\Admin\PostCategory;
use Illuminate\View\View;

class MenuHomePageComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        // $categories = Category::query()->with(['childs'])
        //     ->where(['parent_id' => 0])
        //     ->orderBy('sort_order')
        //     ->get();

        $postCategories = PostCategory::query()
            ->where(['parent_id' => 0])
            ->orderBy('sort_order')
            ->get();

        $serviceCategories = PostCategory::query()
            ->with(['services' => function ($q) {
                $q->where('status', 1);
            }])
            ->where('type', PostCategory::TYPE_SERVICE)
            ->where('parent_id', 0)
            ->orderBy('sort_order')
            ->get();

        // $projectCategories = PostCategory::query()
        //     ->where('type', PostCategory::TYPE_PROJECT)
        //     ->where('parent_id', 0)
        //     ->orderBy('sort_order')
        //     ->get();

        $view->with(['postCategories' => $postCategories, 'serviceCategories' => $serviceCategories]);
    }
}
