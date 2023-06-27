<ul id="errors-list" class="list-group">
    @foreach ($errors as $error)
        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
    @endforeach
</ul>
