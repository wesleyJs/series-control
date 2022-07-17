<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositores\EloquentSeriesRepository;
use App\Repositores\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;
    public function test_when_a_series_is_created_its_seasons_and_episodes_must_also_be_created()
    {
        //Arrange
        /** @var  EloquentSeriesRepository $repository */
        $repository = $this->app->make(SeriesRepository::class);
        $request = new SeriesFormRequest();
        $request->nome = 'Nome';
        $request->seasonsQty = 1;
        $request->episodesPerSeason = 1;

        //Act
        $repository->add($request);

        //Assert
        $this->assertDatabaseHas('series', ['nome' => 'Nome']);
        $this->assertDatabaseHas('seasons', ['number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }
}
