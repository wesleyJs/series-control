<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Temporadas') }}
            <a href="{{route('series.index')}}" class="border-solid border-1 rounded py-1 px-2 text-sm">Voltar</a>
        </h2>
    </x-slot>

    <img src="{{ asset('storage/' . $series->cover) }}" alt="capa da serie" class="pb-5">
    <ul>
        @foreach ($seasons as $season)
            <li class="flex justify-between border px-5 py-3">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>

                <span class="">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-app-layout>
