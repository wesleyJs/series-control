<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Models\Series;
use App\Repositores\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
    }

    public function index()
    {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(Season $season)
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $series = $this->repository->add($request);

        return to_route('series.index')
            ->with('mensagemSucesso', "Série '{$series->nome}' criada com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index');
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index');
    }
}
