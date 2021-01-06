@extends('layouts.master')

@section('content')
    <div class="col-start-2 col-span-3">
        <h1>Artikelen</h1>
    </div>
    <div class="col-start-2 col-span-3">
        @forelse($articles as $article)
            @if($loop->index === 0)
                <table class="table-auto">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @endif

                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->subtitle }}</td>
                    </tr>

                    @if($loop->last)
                    </tbody>
                </table>
            @endif
        @empty
            Geen artikelen gevonden
        @endforelse
    </div>
@endsection
