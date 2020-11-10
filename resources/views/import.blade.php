@extends('layouts.app')

@section('content')
<?php
// $brand = $_GET['brand'];
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
                <div class="card-header" style="background-color: <?PHP echo $color ?>;">
                    <h1>Clear</h1>
                </div>
                <div class="card-body">
                    <h3>Clear All Data</h3>
                    <label for="select_data"><b>ดูข้อมูล</b></label>
                    <button class="btn btn-primary" type="button" id="select_data">Search</button>
                    <button class="btn btn-success" id="clear">Clear</button><br><br>
                    <input type="hidden" name="action" id="action" value="clear">
                </div>
            </div><br><br>
            <!-- ----------------------------Export------------------------- -->
            <form method="POST" id="form-data" action="{{ url('export-data') }}">
                {{csrf_field()}}
                <p>{{ session('status') }}</p>
                <div class="card">
                    <div class="card-header" style="background-color: <?PHP echo $color ?>;">
                        <h1>Export</h1>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="file_name">ตั้งชื่อไฟล์ </label>
                            <input type="text" name="file_name" class="form-control" id="file_name" required><br>
                        </div>
                        <div align="center">
                            <button class="btn btn-danger" id="btn_import" type="submit">Export</button>
                        </div>
                    </div>
                </div>
                <!-- @yield('csv_data') -->
            </form>
            <!-- ----------------------------Export------------------------- -->
            <!-- ----------------------------Import------------------------- -->
            <!-- <form method="POST" id="form-data" enctype="multipart/form-data" action="{{ url('import-data') }}">
                {{csrf_field()}}
                <p>{{ session('status') }}</p>
                <div class="card">
                    <div class="card-header" style="background-color: <?PHP //echo $color 
                                                                        ?>;">
                        <h1>Import</h1>
                    </div>
                    <div class="card-body">
                        <label for="file_import">เลือกไฟล์ </label>
                        <input type="file" name="file_import" class="form-control" id="file_import" required><br>
                        <input type="hidden" name="brand" class="form-control" id="brand" value="<?php //echo $brand 
                                                                                                    ?>"><br>
                        <div>
                            <button class="btn btn-success" id="btn_import" type="submit">Import</button>
                        </div>
                    </div>
                </div>
                @yield('csv_data')
            </form> -->
            <!-- ----------------------------Import------------------------- -->
        </div>
    </div>
</div>
<div id="apicrudModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 1400px;">
        <div class="modal-content">
            <form method="post" id="api_crud_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">shop</th>
                                <th scope="col">brand</th>
                                <th scope="col">month</th>
                                <th scope="col">product_type</th>
                                <th scope="col">product</th>
                                <th scope="col">quantity_09</th>
                                <th scope="col">quantity_10</th>
                                <th scope="col">quantity_11</th>
                                <th scope="col">quantity_12</th>
                                <th scope="col">quantity_13</th>
                                <th scope="col">datetime</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($datas as $row) { ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td scope="row"><?php echo $row['shop'] ?></td>
                                    <td scope="row"><?php echo $row['brand'] ?></td>
                                    <td scope="row"><?php echo $row['month'] ?></td>
                                    <td scope="row"><?php echo $row['product_type'] ?></td>
                                    <td scope="row"><?php echo $row['product'] ?></td>
                                    <td scope="row"><?php echo $row['quantity_09'] ?></td>
                                    <td scope="row"><?php echo $row['quantity_10'] ?></td>
                                    <td scope="row"><?php echo $row['quantity_11'] ?></td>
                                    <td scope="row"><?php echo $row['quantity_12'] ?></td>
                                    <td scope="row"><?php echo $row['quantity_13'] ?></td>
                                    <td scope="row"><?php echo $row['datetime'] ?></td>
                                </tr>

                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    jQuery(document).ready(function(e) {
        var action;

        $('#example').DataTable({
            "pageLength": 10, //จำนวนข้อมูลที่ให้แสดง ต่อ 1 หน้า
            "searching": false, //เปิด=true ปิด=false ช่องค้นหาครอบจักรวาล
            "lengthChange": false, //เปิด=true ปิด=false ช่องปรับขนาดการแสดงผล
        });

        // var file = $("#file_import").val();
        $('#select_data').on('click', function(e) {
            $('#apicrudModal').modal('show');
        });


        // $("#btn_import").click(function(e) {
        //     var file_import = $("#file_import").val();
        //     if (file_import != "") {
        //         alert("Upload file เรียบร้อย");
        //     } else {
        //         alert("กรุณาเลือกไฟล์");
        //     }
        // });

        $("#clear").click(function(e) {
            e.preventDefault();
            var token = "{{csrf_token()}}";
            var form_data = $(this);
            var brand = $("#brand").val();
            $.confirm({
                title: 'Confirm!',
                content: 'คุณต้องการลบข้อมูลหรือไม่!',
                buttons: {
                    ตกลง: function() {
                        $.ajax({
                            type: "post",
                            url: "/pos-data",
                            data: {
                                _token: token,
                                form_data: "SUCCESS!!",
                                action: "clear",
                                brand: brand
                            },
                            success: function(Response) {
                                console.log(Response.msg);
                                if (Response.status == "Y") {
                                    // alert(Response.msg);
                                    window.location = "{{ route('import') }}";
                                } else {
                                    alert(Response.msg);
                                }
                            }
                        });
                    },
                    ยกเลิก: function() {},
                }
            });
        });
    });
</script>
@endsection