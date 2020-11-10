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
                    <div>
                        <li><a href="http://192.168.3.247/stock/file/pos-ssup/html/index.php">Update Promo Type to Database</a> </li> <br>
                        <?php if ($brand == "op") { ?>
                        <li><a href="{{route('import')}}">Survey Product Expire on Shop</a></li><br>
                        <?php } else { ?>
                        <li><a href="{{route('import')}}">Survey Product Expire on Shop</a></li><br>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection