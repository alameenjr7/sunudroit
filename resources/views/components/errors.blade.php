@if ($errors->any())
    <div class="alert alert-card alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <strong class="text-capitalize">Danger!</strong> <br> <li>{{$error}}</li>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        @endforeach
    </div>
@endif