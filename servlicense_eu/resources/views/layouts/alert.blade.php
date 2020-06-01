<div class="alert block block-rounded block-bordered" id="unverifedAlert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>{{ $title }}</strong><br>
    <small>
        <ul class="pl-4 mb-0">
            @foreach($errors as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </small>
    <br>
</div>
