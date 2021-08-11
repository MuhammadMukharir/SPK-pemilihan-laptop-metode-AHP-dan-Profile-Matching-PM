<div class="">
    @if (session()->has('flash_notification.success')) 
    <div class="alert alert-success alert-block">

        <button type="button" class="btn btn-danger close" data-dismiss="alert">×</button>

        <i class="icon fas fa-check"></i> {!! session('flash_notification.success') !!}

    </div>
    @endif

    @if ($message = Session::pull('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="btn btn-danger close" data-dismiss="alert">×</button>

        <i class="icon fas fa-check"></i> {{ $message }}

    </div>

    @endif


    @if ($message = Session::get('error'))

    <div class="alert alert-danger alert-block">

        <button type="button" class="btn btn-danger close" data-dismiss="alert">×</button>

        <i class="icon fas fa-ban"></i> {{ $message }}

    </div>

    @endif


    @if ($message = Session::get('warning'))

    <div class="alert alert-warning alert-block">

        <button type="button" class="btn btn-danger close" data-dismiss="alert">×</button>

        <i class="icon fas fa-exclamation-triangle"></i> {{ $message }}

    </div>

    @endif


    @if ($message = Session::get('info'))

    <div class="alert alert-info alert-block">

        <button type="button" class="btn btn-danger close" data-dismiss="alert">×</button>

        <i class="icon fas fa-info"></i> {{ $message }}

    </div>

    @endif

    @if ($errors->any())

    <div class="alert alert-danger">

        <button type="button" class="btn btn-danger close" data-dismiss="alert">×</button>

        <i class="icon fas fa-ban"></i> <strong>Whoops!</strong> There were some problems with your input.<br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

    @endif


</div>
