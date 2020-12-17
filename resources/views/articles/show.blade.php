<script src="{{ asset('journal/js/app.js') }}"></script>
<link href="{{ asset('journal/css/app.css') }}" rel="stylesheet" />

<h1>{{ $article->title }}</h1>
<h2>{{ $article->subtitle }}</h2>
<p class="introduction">{{ $article->introduction }}</p>

{{ $article->content }}