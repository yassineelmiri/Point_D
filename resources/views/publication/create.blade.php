<x-master title="Mon Profile">

    <h3>Ajouter Publication</h3>
    @if ($errors->any())
        <x-alert type="danger">
            <h6>Errors</h6>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        </x-alert>
    @endif

    <form method="POST" action="{{ route('publication.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Titer</label>
            <input type="text" name="titer" class="form-control" value="{{ old('Titer') }}"/>
            @error('titer')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea type="body" name="body" class="form-control" >{{ old('body') }}</textarea>
            @error('body')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">images</label>
            <input type="file" name="image" class="form-control" />
        </div>
        <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary btn-block">
                Ajouter
            </button>
        </div>
    </form>




</x-master>
