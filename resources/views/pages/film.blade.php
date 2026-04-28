<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Détail film - {{ $film->titreFil }} - CineForAll</title>

    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="{{ asset('Header-style.css') }}">
</head>

<body class="film-detail-body">
@include('pages.header')

<main class="film-detail-wrap">
    <section class="film-detail-card">

        <div class="film-detail-left">

            <div class="film-detail-poster">
                <img src="{{ asset('images/' . $film->imgFil) }}" alt="{{ $film->titreFil }}">
            </div>

            {{-- NOTATION --}}
            <div class="film-detail-rate">

                @php
                    $likes    = $film->notes->where('notFil', 1)->count();
                    $dislikes = $film->notes->where('notFil', 0)->count();
                    $total    = $likes + $dislikes;
                    $moyenne  = $total > 0 ? round(($likes / $total) * 10, 1) : null;
                    $monVote  = Auth::check()
                                ? $film->notes->where('user_id', Auth::user()->id)->first()
                                : null;
                @endphp

                {{-- Score moyen --}}
                <div class="rate-score">
                    @if($moyenne !== null)
                        <span class="rate-score-number">{{ $moyenne }}</span>
                        <span class="rate-score-label">/ 10</span>
                    @else
                        <span class="rate-score-empty">Aucun vote</span>
                    @endif
                </div>

                {{-- Boutons vote --}}
                @auth
                    <div class="rate-buttons">
                        <form action="{{ route('film.vote', $film->idFil) }}" method="POST">
                            @csrf
                            <input type="hidden" name="vote" value="1">
                            <button type="submit" class="rate-btn rate-btn-like {{ ($monVote && $monVote->notFil) ? 'rate-btn-active' : '' }}">
                                👍 <span>{{ $likes }}</span>
                            </button>
                        </form>

                        <form action="{{ route('film.vote', $film->idFil) }}" method="POST">
                            @csrf
                            <input type="hidden" name="vote" value="0">
                            <button type="submit" class="rate-btn rate-btn-dislike {{ ($monVote && !$monVote->notFil && $monVote) ? 'rate-btn-active' : '' }}">
                                👎 <span>{{ $dislikes }}</span>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="rate-buttons rate-buttons-guest">
                        <span class="rate-btn rate-btn-like">👍 {{ $likes }}</span>
                        <span class="rate-btn rate-btn-dislike">👎 {{ $dislikes }}</span>
                    </div>
                    <p class="rate-login-msg">
                        <a href="{{ route('login') }}">Connectez-vous</a> pour noter ce film
                    </p>
                @endauth

            </div>

        </div>

        <div class="film-detail-right">
            <div class="film-detail-header">
                <h1 class="film-detail-title">{{ $film->titreFil }}</h1>

                @if(isset($film->noteFil))
                    <span class="film-detail-note">Note : {{ $film->noteFil }}</span>
                @endif
            </div>

            <div class="film-detail-meta">
                <p>
                    <span class="meta-label">Sortie :</span>
                    {{ $film->dateSortie ? \Carbon\Carbon::parse($film->dateSortie)->format('d/m/Y') : 'Non renseignée' }}
                </p>

                <p>
                    <span class="meta-label">{{ $film->genre->libGenre ?? 'Genre inconnu' }}</span>
                    @if(!empty($film->dureFil))
                        ({{ intdiv($film->dureFil, 60) }}h{{ str_pad($film->dureFil % 60, 2, '0', STR_PAD_LEFT) }})
                    @endif
                </p>
                <p><span class="meta-label">Réalisé par </span>
                    @forelse($film->realisateurs as $real)
                        <a href="{{ route('realisateur.simple.show', $real->idPer) }}">
                            {{ $real->prenomPer }} {{ $real->nomPer }}</a>
                        {{ !$loop->last ? ', ' : '' }}
                    @empty
                        <em>Non renseigné</em>
                    @endforelse
                </p>
                <p><span class="meta-label">Avec </span>
                    @forelse($film->acteursPrincipaux as $acteur)
                        <a href="{{ route('acteur.simple.show', $acteur->idPer) }}">
                            {{ $acteur->prenomPer }} {{ $acteur->nomPer }}</a>
                        {{ !$loop->last ? ', ' : '' }}
                    @empty
                        <em>Non renseigné</em>
                    @endforelse
                </p>

            </div>

            <p class="film-detail-synopsis">
                {{ $film->descFil ?? 'Aucun synopsis disponible.' }}
            </p>
        </div>

    </section>
</main>

</body>
</html>
