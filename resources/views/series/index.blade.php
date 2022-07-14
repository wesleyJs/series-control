<x-app-layout title="Séries">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Controle de Séries') }}
        </h2>
    </x-slot>

    <h1 class="font-bold px-5 py-3">Minhas Series:</h1>
    <ul>
        @foreach ($series as $serie)
            <li class="flex justify-between border px-5 py-3">
                <a href="{{ route('seasons.index', $serie->id) }}">
                    {{ $serie->nome }}
                </a>

                <span class="flex">
                    <a href="{{ route('series.edit', $serie) }}" class="bg-blue-700 text-amber-50 text-xs py-1 px-2 rounded mx-2">Editar</a>
                    <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-amber-50 text-xs py-1 px-2 rounded">Excluir</button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</x-app-layout>
