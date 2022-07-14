<?php

namespace App\Repositores;

use App\Http\Requests\SeriesFormRequest;

interface SeriesRepository
{
    public function add(SeriesFormRequest $request);
}
