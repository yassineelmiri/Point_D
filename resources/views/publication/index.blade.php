<x-master title="Publication">
    <div class="text-center">
        <h3>Les Publication</h3>
        <form class="d-flex justify-content-center" action="{{ route('publication.search') }}" method="GET">
            <input type="text" name="search" placeholder="Entre un nom de publication" class="form-control me-2">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        
        <a class="btn btn-primary mt-5" href="{{ route('publication.create') }}">Créer nouvelle publication</a>
    </div>

    <div class="container w-75 mx-auto mt-5">
        <div class="row">
            @foreach ($publications as $publication)
                <x-publication :canUpdate="auth()->user()->id === $publication->profile_id" :publication="$publication" />
            @endforeach
        </div>
    </div>
    
    <div class="d-flex justify-content-center mt-3">
        {{ $publications->links() }}
    </div>
</x-master>
