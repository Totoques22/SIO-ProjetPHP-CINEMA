{{--<!DOCTYPE html>--}}
{{--<html lang="fr">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0" />--}}
{{--    <title>{{ auth()->user()->username }} - CineForAll</title>--}}

{{--    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet" />--}}
{{--    <link rel="stylesheet" href="{{ asset('styles.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('Header-style.css') }}">--}}
{{--</head>--}}

{{--<body class="cinema-body">--}}
{{--@if(auth()->check() && auth()->user()->role === 'admin')--}}
{{--    @include('pages.header-admin')--}}
{{--@else--}}
{{--    @include('pages.header')--}}
{{--@endif--}}

{{--<div class="container mt-5">--}}
{{--    <h2 class="text-center mb-4">Réservations de {{ auth()->user()->username }}</h2>--}}

{{--    --}}{{-- Réservations à venir --}}
{{--    <h3 class="mb-4">Réservations à venir</h3>--}}

{{--    @if($reservationsAVenir->isEmpty())--}}
{{--        <div class="alert alert-info text-center">--}}
{{--            Aucune réservation à venir--}}
{{--        </div>--}}
{{--    @else--}}
{{--        <div class="row">--}}
{{--            @foreach($reservationsAVenir as $reservation)--}}

{{--                <div class="col-md-4 mb-4">--}}
{{--                    <div class="card shadow-lg h-100 border-success">--}}

{{--                        <img src="{{ asset('images/'.$reservation->seance->film->imgFil) }}"--}}
{{--                             class="card-img-top"--}}
{{--                             alt="{{ $reservation->seance->film->titreFil }}">--}}

{{--                        <div class="card-body">--}}

{{--                            <h5 class="card-title">--}}
{{--                                {{ $reservation->seance->film->titreFil }}--}}
{{--                            </h5>--}}

{{--                            <p class="card-text">--}}
{{--                                {{ \Carbon\Carbon::parse($reservation->seance->dateHeurSea)->format('d/m/Y H:i') }}--}}
{{--                            </p>--}}

{{--                            <p class="card-text">--}}
{{--                                Salle : {{ $reservation->seance->salle->nomSal ?? 'N/A' }}--}}
{{--                            </p>--}}

{{--                            <p class="card-text">--}}
{{--                                {{ $reservation->seance->langue->libLangue ?? '' }}--}}
{{--                                - {{ $reservation->seance->typeSeance->libTypeSea ?? '' }}--}}
{{--                            </p>--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    --}}{{-- 🕰️ Réservations passées --}}
{{--    <h3 class="mt-5 mb-4">Réservations passées</h3>--}}

{{--    @if($reservationsPassees->isEmpty())--}}
{{--        <div class="alert alert-info text-center">--}}
{{--            Aucune réservation passée--}}
{{--        </div>--}}
{{--    @else--}}
{{--        <div class="row">--}}
{{--            @foreach($reservationsPassees as $reservation)--}}

{{--                <div class="col-md-4 mb-4">--}}
{{--                    <div class="card shadow-lg h-100 border-secondary" style="opacity: 0.7;">--}}

{{--                        <img src="{{ asset('images/'.$reservation->seance->film->imgFil) }}"--}}
{{--                             class="card-img-top"--}}
{{--                             alt="{{ $reservation->seance->film->titreFil }}">--}}

{{--                        <div class="card-body">--}}

{{--                            <h5 class="card-title">--}}
{{--                                {{ $reservation->seance->film->titreFil }}--}}
{{--                            </h5>--}}

{{--                            <p class="card-text">--}}
{{--                                {{ \Carbon\Carbon::parse($reservation->seance->dateHeurSea)->format('d/m/Y H:i') }}--}}
{{--                            </p>--}}

{{--                            <p class="card-text">--}}
{{--                                Salle : {{ $reservation->seance->salle->nomSal ?? 'N/A' }}--}}
{{--                            </p>--}}

{{--                            <p class="card-text">--}}
{{--                                {{ $reservation->seance->langue->libLangue ?? '' }}--}}
{{--                                - {{ $reservation->seance->typeSeance->libTypeSea ?? '' }}--}}
{{--                            </p>--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            @endforeach--}}
{{--        </div>--}}
{{--@endif--}}



    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ auth()->user()->username }} - CineForAll</title>

    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="{{ asset('Header-style.css') }}">
    <link rel="stylesheet" href="{{ asset('reservations.css') }}">
</head>

<body class="reservations-body">

@if(auth()->check() && auth()->user()->role === 'admin')
    @include('pages.header-admin')
@else
    @include('pages.header')
@endif

<div class="reservations-content">

    <h1 class="reservations-title">Mes réservations</h1>

    {{-- Réservations à venir --}}
    <div class="reservations-section">
        <h2 class="reservations-section-title">À venir</h2>

        @if($reservationsAVenir->isEmpty())
            <div class="reservations-empty">Aucune réservation à venir</div>
        @else
            <div class="reservations-grid">
                @foreach($reservationsAVenir as $reservation)
                    <div class="resa-card">
                        <span class="resa-badge">À VENIR</span>

                        <img
                            src="{{ asset('images/'.$reservation->seance->film->imgFil) }}"
                            alt="{{ $reservation->seance->film->titreFil }}"
                            class="resa-card-poster"
                        />

                        <div class="resa-card-body">
                            <div class="resa-card-title">
                                {{ $reservation->seance->film->titreFil }}
                            </div>

                            <div class="resa-card-meta">
                                <div class="resa-meta-item">
                                    <span class="resa-meta-dot"></span>
                                    {{ \Carbon\Carbon::parse($reservation->seance->dateHeurSea)->format('d/m/Y H:i') }}
                                </div>

                                <div class="resa-meta-item">
                                    <span class="resa-meta-dot"></span>
                                    Salle {{ $reservation->seance->salle->nomSal ?? 'N/A' }}
                                </div>

                                <div class="resa-meta-item">
                                    <span class="resa-meta-dot"></span>
                                    {{ $reservation->seance->langue->libLangue ?? '' }}
                                    &nbsp;·&nbsp;
                                    {{ $reservation->seance->typeSeance->libTypeSea ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Réservations passées --}}
    <div class="reservations-section">
        <h2 class="reservations-section-title">Passées</h2>

        @if($reservationsPassees->isEmpty())
            <div class="reservations-empty">Aucune réservation passée</div>
        @else
            <div class="reservations-grid">
                @foreach($reservationsPassees as $reservation)
                    <div class="resa-card resa-card--past">

                        <img
                            src="{{ asset('images/'.$reservation->seance->film->imgFil) }}"
                            alt="{{ $reservation->seance->film->titreFil }}"
                            class="resa-card-poster"
                        />

                        <div class="resa-card-body">
                            <div class="resa-card-title">
                                {{ $reservation->seance->film->titreFil }}
                            </div>

                            <div class="resa-card-meta">
                                <div class="resa-meta-item">
                                    <span class="resa-meta-dot"></span>
                                    {{ \Carbon\Carbon::parse($reservation->seance->dateHeurSea)->format('d/m/Y H:i') }}
                                </div>

                                <div class="resa-meta-item">
                                    <span class="resa-meta-dot"></span>
                                    Salle {{ $reservation->seance->salle->nomSal ?? 'N/A' }}
                                </div>

                                <div class="resa-meta-item">
                                    <span class="resa-meta-dot"></span>
                                    {{ $reservation->seance->langue->libLangue ?? '' }}
                                    &nbsp;·&nbsp;
                                    {{ $reservation->seance->typeSeance->libTypeSea ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

</body>
</html>
