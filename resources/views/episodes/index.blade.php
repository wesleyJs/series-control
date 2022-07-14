<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Episodeos') }}
{{--            <a href="{{route('seasons.index')}}" class="border-solid border-1 rounded py-1 px-2 text-sm">Voltar</a>--}}
        </h2>
    </x-slot>

    <form method="post" class="mt-2">
        @csrf
        <ul>
            @foreach ($episodes as $episode)
                <li class="flex justify-between border px-5 py-3">
                    Episódio {{ $episode->number }}

                    <label>
                        <input type="checkbox"
                               name="episodes[]"
                               value="{{ $episode->id }}"
                               @if ($episode->watched) checked @endif />
                    </label>
                </li>
            @endforeach
        </ul>

        <div class="flex justify-end">
            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white mt-2 py-1 px-2 rounded">
                Salvar
            </button>
        </div>
    </form>
</x-app-layout>
