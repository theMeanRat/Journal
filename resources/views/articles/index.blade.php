<script src="{{ asset('journal/js/app.js') }}"></script>
<link href="{{ asset('journal/css/app.css') }}" rel="stylesheet" />

<h1>Showing all articles</h1>

@forelse ($articles as $article)
    <li>{{ $article-title }}</li>
@empty
    <p>No articles found</p>
@endforelse