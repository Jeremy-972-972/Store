<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CategoryList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
// on prends les category dans la base de données en les appeleant avec un $categories
        $categories = Category::limit(6)->get();
        return view('components.category-list' ,compact( 'categories'));
    }
}
