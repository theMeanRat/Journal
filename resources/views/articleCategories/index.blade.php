<script src="{{ asset('journal/js/app.js') }}"></script>
<link href="{{ asset('journal/css/app.css') }}" rel="stylesheet" />

<h1>Showing all article categories</h1>

@forelse($articleCategories as $articleCategory)
    <li>{{ $articleCategory->name }}</li>
@empty
    <p>No articles categories found</p>
@endforelse