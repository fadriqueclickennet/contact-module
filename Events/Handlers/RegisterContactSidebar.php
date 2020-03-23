<?php

namespace Modules\Contact\Events\Handlers;

use Maatwebsite\Sidebar\Badge;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;
use Modules\Contact\Repositories\ContactRequestRepository;

class RegisterContactSidebar extends AbstractAdminSidebar
{
    /**
     * Method used to define your sidebar menu groups and items
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('contact::contact.titulo'), function (Item $item) {
                $item->icon('far fa-envelope');
                $item->weight(config('asgard.contact.config.sidebar-position', 15));
                $item->route('admin.contact.contactrequest.index');
                $item->badge(function (Badge $badge, ContactRequestRepository $requests) {
                    $badge->setClass('badge-info');
                    $badge->setValue($requests->countNotView());
                });
                $item->authorize(
                    $this->auth->hasAccess('contact.contactrequests.index')
                );
            });
        });

        return $menu;
    }
}
