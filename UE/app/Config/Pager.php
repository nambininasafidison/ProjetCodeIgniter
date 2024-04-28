<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------------
     *
     * Pagination links are rendered out using views to configure their
     * appearance. This array contains aliases and the view names to
     * use when rendering the links.
     *
     * Within each view, the Pager object will be available as $pager,
     * and the desired group as $pagerGroup;
     *
     * @var array<string, string>
     */

    public array $templates = [
        'default_full'   => 'CodeIgniter\Pager\Views\default_full',
        'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
        'default_head'   => 'CodeIgniter\Pager\Views\default_head',
    ];
/*
    public array $templates = [
	'default_full'   => '<div class="pagination">{pagination}</div>',
	'default_simple' => '{pagination}',
	'default_head'   => '{head}',
	'default_tail'   => '{tail}',
	'default_first' => '{first}',
	'default_last'   => '{last}',
	'default_prev'   => '{prev}',
	'default_next'   => '{next}',
	'default_number' => '{number}',
    ];
*/
    /**
     * --------------------------------------------------------------------------
     * Items Per Page
     * --------------------------------------------------------------------------
     *
     * The default number of results shown in a single page.
     */
    public int $perPage = 5;
}
