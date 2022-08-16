<?php

namespace Modules\Core\Listeners;

use Modules\Core\Events\MenuWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Module;

class AddMenuItems
{
     public function handle(MenuWasCreated $menu)
    {
        $menu = $menu->menu;

        $menus = config('adminmenu');

        foreach (Module::allEnabled() as $module){
            if (config($module->getlowername().'.menus')){
                $menus = array_merge($menus, config($module->getlowername().'.menus'));
            }
        }

        foreach ($menus as $item){
            if (isset($item['submenu'])){
                $this->getSubmenu($menu, $item);
            }elseif(isset($item['can'])){
                $this->getMenu($menu, $item);
            }elseif (isset($item['header'])){
                $menu->addHeader(trans($item['header']), $item['order'] ?? null);
            }
        }
    }

    private function getSubmenu($menu, $item){
        if (auth()->user()->can($item['can'])){
            if ($menu->whereTitle(__($item['text']))){
                $menu->whereTitle(__($item['text']), function ($submenu) use($item){
                    foreach ($item['submenu'] as $submenuItem){
                        if (auth()->user()->can($submenuItem['can'])) {
                            isset($submenuItem['route'])
                                ? $submenu->route($submenuItem['route'], trans($submenuItem['text']))
                                : $submenu->url($submenuItem['url'] ?? null, trans($submenuItem['text']));
                        }
                    }
                });
            }else{
                $menu->dropdown(trans($item['text']), function ($submenu) use ($item){
                    foreach ($item['submenu'] as $submenuItem){
                        if (auth()->user()->can($submenuItem['can'])) {
                            isset($submenuItem['route'])
                                ? $submenu->route($submenuItem['route'], trans($submenuItem['text']))
                                : $submenu->url($submenuItem['url'] ?? null, trans($submenuItem['text']));
                        }
                    }
                }, ['icon' => $item['icon']])->order($item['order'] ?? null);
            }
        }
    }

    public function getMenu($menu, $item)
    {
        if (auth()->user()->can($item['can'])){
            $menu->add([
                'url' => isset($item['route']) ? route($item['route']) : (isset($item['url']) ? url($item['url']) : '#'),
                'title' => trans($item['text']),
                'icon' => $item['icon'],
                'order' => $item['order'] ?? null
            ]);
        }
    }
}
