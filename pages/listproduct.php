<div class="breadcrumb">PRODUCTS</div>


<!-- My Enhancement Stock Level Condition .. -->



<table class="table table-striped" id="tbproducts">
        <thead>
            <th>Description</th>
              <th>Brand</th>
              <th>Product no.</th>
              <th>Size</th>
              <th>Voltage</th>
                <th>Quantity</th>
              <th>Price</th>
                <th>Edit</th>
        </thead>
    <tbody>
        <?php 
        checkStock();
        productList() ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
        $('#tbproducts').DataTable({
        dom: 'Bfrtip',
         buttons: [
        'excel', 'print'
    ]
    });
});
</script>