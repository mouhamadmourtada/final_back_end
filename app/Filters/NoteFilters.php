<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class NoteFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
