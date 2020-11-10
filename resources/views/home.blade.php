@extends('layouts.app')

@section('content')
<?php
if ($brand == "op") {
    $color = "#1ab9a7";
} else {
    $color = "rgb(202, 208, 242)";
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="background-color: <?php echo $color ?>;">
                    <div align="center">
                        <?php if ($brand == "op") { ?>
                            <img src="{{ asset('img/ops.png')}}" alt="" width="200px">
                        <?php } else { ?>
                            <img src="{{ asset('img/cps.png')}}" alt="" width="200px">
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{'Hello'}} {{ __(Auth::user()->name) }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
