<div class="breadcrumb">Transaction History</div>
<table class="table table-striped" id="transaction">
        <thead>
               <th>Transaction #</th>
                <th>Customer name</th>
            <th>Contact no.</th>
              <th>Items</th>
                <th>Total</th>
                <th>Timestamp</th>
        </thead>
    <tbody>
        <?php 
    checkStock();
       purchaseList() ?>
    </tbody>
</table>
 

<script>
$(document).ready(function(){
        $('#transaction').DataTable({
        dom: 'Bfrtip',
         buttons: [
        'copy', 'excel', 'pdf', 'print' 
    ]
    });
});
</script>