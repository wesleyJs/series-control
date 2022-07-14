<?php

namespace App\Providers;

use App\Repositores\EloquentSeriesRepository;
use App\Repositores\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{

    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];
}
