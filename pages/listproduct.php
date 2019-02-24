<div class="breadcrumb">PRODUCTS</div>


<!-- My Enhancement Stock Level Condition .. -->
<div class="card c1">
        <h5 class="card-header">Stocks Current Conditions</h5>
        <div class="card-body">
            <canvas id="barChartE" width="1394" height="300"></canvas>
        </div>
    </div>


<table class="table table-striped">
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
        
        productList() ?>
    </tbody>
</table>