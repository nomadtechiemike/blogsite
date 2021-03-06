<?php

namespace Botble\Translation\Supports;

class Filter
{

    /**
     * Filter constructor.
     */
    public function __construct()
    {
        add_filter(BASE_FILTER_REGISTER_PLATFORM_ADMIN_OPTIONS, [$this, 'registerAdminOption'], 102, 1);
    }

    /**
     * Trigger __construct function
     *
     * @return Filter
     */
    public static function initialize()
    {
        return new self();
    }

    /**
     * @param string $options
     * @return string
     * @author Sang Nguyen
     */
    public function registerAdminOption($options)
    {
        return $options . view('translations::partials.admin-option')->render();
    }
}