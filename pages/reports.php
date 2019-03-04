<style>
.media-text-right
    {
        text-align: right;
    }
    
</style>       

<div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart  f-s-40 color-primary"></i></span>
                                </div>&nbsp;
                                <div class="media-body media-text-right">
                                    <h2><?php   countProducts()  ?></h2>
                                    <p class="m-b-0">PRODUCTS</p>
                                </div>
                            </div>
                        </div>
                    </div>
           
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-chart-line f-s-40 color-danger"></i></span>
                                </div>&nbsp;
                                <div class="media-body media-text-right">
                                    <h3><?php  
    
                         monthSales() ?></h3>
                                    <p class="m-b-0">Month Sales</p>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>&nbsp;
                                <div class="media-body media-text-right">
                                    <h2><?php  
    
    countUsers() ?></h2>
                                    <p class="m-b-0">USERS</p>
                                </div>
                            </div>
                        </div>
                    </div>
     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-boxes  f-s-40 color-primary"></i></span>
                                </div>&nbsp;
                                <div class="media-body media-text-right">
                                    <h2><?php   countSupplier()  ?></h2>
                                    <p class="m-b-0">SUPPLIER</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<br>
<div class="card c1">
    <h5 class="card-header">Stocks Current Quantity</h5>
        <div class="card-body">
            <canvas id="barChartE" width="1394" height="300"></canvas>
        </div>
    </div>
<br>
    <div class="card">
        <h5 class="card-header">Monthly Sales Report</h5>
        <div class="card-body">
             <canvas id="myAreaChart" width="100%" height="40"></canvas>
        </div>
    </div>

	<script>
		$(document).ready(function() {
var ctx1 = document.getElementById( "barChartE" );
      //  var ctx2 = document.getElementById( "barChartW" );
				  $.ajax({
                  url:"brain/chart.php",
                    method:"POST",
                    data:{action:"mychart"},
                    success: function(data){
                        var month= [];
			             var sales = [];
                        var e = $.parseJSON(data);
                        for(var i = 0; i < e.length; i++) {       
                           // console.log(e[i].username);
                           month.push(e[i].month);
                            sales.push(e[i].sales);
                        }
                     function getMax(sales){
                return Math.max.apply(null, sales);
                }
                var tts =getMax(sales) +1000;
                      var ctx = document.getElementById("myAreaChart");
                        var myLineChart = new Chart(ctx, {
                          type: 'line',
                          data: {
                            labels: month,
                            datasets: [{
                              label: "Sales",
                              lineTension: 0.3,
                              backgroundColor: "rgba(2,117,216,0.2)",
                              borderColor: "rgba(2,117,216,1)",
                              pointRadius: 5,
                              pointBackgroundColor: "rgba(2,117,216,1)",
                              pointBorderColor: "rgba(255,255,255,0.8)",
                              pointHoverRadius: 5,
                              pointHoverBackgroundColor: "rgba(2,117,216,1)",
                              pointHitRadius: 50,
                              pointBorderWidth: 2,
                              data:sales,
                            }],
                          },
                          options: {
                            scales: {
                              xAxes: [{
                                time: {
                                  unit: 'date'
                                },
                                gridLines: {
                                  display: false
                                },
                                ticks: {
                                  maxTicksLimit: 10
                                }
                              }],
                              yAxes: [{
                                ticks: {
                                  min: 0,
                                  max: tts,
                                  maxTicksLimit: 10
                                },
                                gridLines: {
                                  color: "rgba(0, 0, 0, .125)",
                                }
                              }],
                            },
                            legend: {
                              display: false
                            }
                          }
                        });
                            $('#chartnoti').fadeOut('slow');
                    } //success end
                
            });
            
            
                  //bar chart
	
        
            $.ajax({
                  url:"brain/controller.php",
                    method:"POST",
                    data:{request:"stockCondition"},
                    success: function(data){
                        
                        var desc = [];
			             var q = [];
                        var e = $.parseJSON(data);
                        for(var i = 0; i < e.length; i++) {       
                           
                            desc.push(e[i].description);
                           q.push(e[i].quantity);
                        }
                          function getMax(q){
                return Math.max.apply(null, q);
                }
                var tts =getMax(q) +100;
	//    ctx.height = 200;
	var myChart = new Chart( ctx1, {
		type: 'bar',
		data: {
			labels: desc,
			datasets: [
				{
					label: "Stocks Quantity",
					data: q,
					borderColor: "rgba(237, 230, 94, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(58, 209, 96, 0.5)"
                }]
		},
		options: {
			scales: {
				yAxes: [ {
					ticks: {
						beginAtZero: true,
                        max: tts
					}
                                } ]
			}
		}
	} );
                        
                },
                error: function(e)
                {
                    alert(e);
                } // success
            }); //ajax

		});
	</script>