<?php

namespace App\View\Composers;

use App\Models\Post;
use App\Models\Order;
use Illuminate\View\View;

class OrderComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('orders', Order::orderByDesc('created_at')->paginate());
    }
}