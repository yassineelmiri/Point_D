<x-master title="Page d'accueil">
<h3>Request / Response</h3>
<form action="{{ route('form') }}" method="post">
    @csrf
    <input type="text" name="input_field" class="form-contro">
    <input type="submit" value="Envoyer" class="btn btn-sm btn-primary">
</form>
</x-master>