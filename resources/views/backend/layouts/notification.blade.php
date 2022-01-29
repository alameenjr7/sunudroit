@if (session('sucess'))

<div class="alert alert-card alert-success" id="alert" role="alert"><strong class="text-capitalize">Success!</strong> {{session('success')}}
    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>

@elseif (session('error'))

    <div class="alert alert-card alert-danger" id="alert" role="alert"><strong class="text-capitalize">Danger!</strong> {{session('error')}}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
@endif