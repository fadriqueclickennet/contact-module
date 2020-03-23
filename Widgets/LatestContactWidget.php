<?php

namespace Modules\Contact\Widgets;

use Modules\Contact\Repositories\ContactRequestRepository;
use Modules\Dashboard\Foundation\Widgets\BaseWidget;

class LatestContactWidget extends BaseWidget
{
    /**
     * @var ContactRequestRepository
     */
    private $contact;

    public function __construct(ContactRequestRepository $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the widget name
     * @return string
     */
    protected function name()
    {
        return 'LatestContactWidget';
    }

    /**
     * Get the widget options
     * Possible options:
     *  x, y, width, height
     * @return string
     */
    protected function options()
    {
        return [
            'width' => '4',
            'height' => '4',
        ];
    }

    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'contact::admin.widgets.latest-contact';
    }

    /**
     * Get the widget data to send to the view
     * @return string
     */
    protected function data()
    {
        return ['latestContactRequests' => $this->contact->all()];
    }
}
