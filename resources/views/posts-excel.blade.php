<table class="table" id="example">
    <thead>
        <tr>
            <th scope="col">id</th>
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