<?php

namespace App\View\Components\Admin;

use App\Models\Entities\Order;
use App\View\BaseComponent;
use Illuminate\Support\Facades\Route;

class Sidebar extends BaseComponent
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return $this->coreAdminView('parts.sidebar');
    }

    public function navList()
    {
        return [
            $this->navItem(route('admin.index'), 'ti-home', 'Главное'),
            $this->navItem(route('country.index'), 'ti-flag-alt', 'Страны'),
            $this->navItem(route('city.index'), 'ti-menu-alt', 'Города'),
            $this->navItem(route('address.index'), 'ti-location-arrow', 'Адреса'),
            $this->navItem(route('box.index'), 'ti-dropbox', 'Типы ящика'),
            $this->navItem(route('product.index'), 'ti-shopping-cart', 'Продукты'),
            $this->navItem(route('driver.index'), 'ti-truck', 'Водители'),
            $this->navItem(route('company.index'), 'ti-direction-alt', 'Компании'),
        ];
    }

    private function navItem($url, $icon, $name, $items = [])
    {
        return [
            'url' => $url,
            'icon' => $icon,
            'title' => $name,
            'items' => $items,
            'current' => request()->getUri() == $url
        ];
    }

    private function divider()
    {
        return [
            'divider' => true
        ];
    }
}
