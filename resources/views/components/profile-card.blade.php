<div class="col-sm-4 my-4">
    <div class="card text-start">
        <img class="card-img-top w-50 mx-auto" src="{{ asset('storage/'.$profile->image) }}" alt="Title" />
        <div class="card-body">
            <h4 class="card-title">{{ $profile->name }}</h4>
            <p class="card-text">{{ Str::limit($profile->bio, 50) }}</p>
            <a href="{{ route('profiles.show', $profile->id) }}" class="stretched-link"></a>
        </div> 
        @if (auth()->user()->name === 'chef baba')
        <div class="card-foot border-top px-3 py-3 bg-light" style="z-index: 9">
            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @method('DELETE')
                @csrf    
                <button class="btn btn-danger float-end" >Supprimer</button>
            </form>
            <form action="{{ route('profiles.edit',$profile->id) }}">
                @csrf   
                <button class="btn btn-primary float-end mx-2" >Modifier</button>
            </form>
        </div>  
        @endif 
        
    </div>
</div>
 