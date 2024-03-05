<div class="card my-2 bg-light">
    <div class="card-body">
        @auth
            @if ($canUpdate === true)
                <a class="float-end btn btn-primary btn-sm"
                    href="{{ route('publication.edit', $publication->id) }}">Modifier</a>
                <form action="{{ route('publication.destroy', $publication->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Vouler vous vraiment supprimer')"
                        class="mx-2 float-end btn btn-danger btn-sm">Supprimer</button>
                </form>
            @endif
        @endauth
        <blockquote class="blockquote mb-0">
            <div class="container bg-lenght">
                <div class="col-md-4">
                    <div class="position-relative">
                    <img class="rounded-circle" src="{{ asset('storage/' . $publication->profile->image) }}"
                        width="100px" alt="image">
                    <h3>{{ $publication->profile->name }}</h3>
                    <a href="{{ route('profiles.show', $publication->profile->id) }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <hr>
           <div class="col">
                <h5>{{ $publication->titer }}</h5>
                <p> {{ $publication->body }}</p>
                @if (!is_null($publication->image))
                    <footer class="blockquote-footer">
                        <img class="img-fluid" src="{{ asset('storage/' . $publication->image) }}" alt="image">
                        <br>
                        <cite title="Source title">{{ $publication->created_at->format('d-m-Y') }}</cite>
                    </footer>
                @endif
            </div>

        </blockquote>
    </div>
</div>
