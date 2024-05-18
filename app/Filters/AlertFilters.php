<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class AlertFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
