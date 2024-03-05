<x-master title="Profiles">

    <h3>Profiles</h3>
    @if (auth()->user()->name === 'chef baba')
        <a class="btn btn-primary mt-5 " href="{{ route('profiles.create') }}">Créer nouveau compte</a>
    @endif
    <div class="row my-5">
        @foreach ($profiles as $profile)
            <x-profile-card :profile="$profile" />
        @endforeach
    </div>
    {{ $profiles->links() }}

</x-master>
