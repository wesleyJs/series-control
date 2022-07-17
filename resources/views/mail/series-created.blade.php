@component('mail::message')
    # {{ $nomeSerie }} criada

    A série {{ $nomeSerie }} com {{ $seasonsQty }} Temporada e {{ $qtdEpisodeoPorTemporada }} episódios foi criada.

    Acesse aqui:

{{--    @component('mail::button', ['url' => route('seasons.index', $idSerie)])--}}
        ver mais
{{--    @endcomponent--}}

@endcomponent
