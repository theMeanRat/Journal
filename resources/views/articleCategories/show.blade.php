<script src="{{ asset('journal/js/app.js') }}"></script>
<link href="{{ asset('journal/css/app.css') }}" rel="stylesheet" />

<h1>{{ $articleCategory->name }}</h1>
@forelse($articles as $article)
    <div class="card articleContainer">
        <div class="card-body">
            <h2 class="card-title">{{ $article->title }}</h2>
            <h3 class="card-subtitle">{{ $article->subtitle }}</h3>
            <p class="card-text">{{ $article->introduction }}</p>
            <a href="#" class="card-link">Lees meer...</a>
        </div>
    </div>
@empty
    <p>Geen artikelen gevonden in deze categorie.</p>
@endforelse