<div class="panel panel-info">
	<div class="panel-heading"><h3 style="margin-top: 5px"><span class="glyphicon glyphicon-dashboard"></span>  Dashboard</h3></div>
</div>


<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#menu1">Sekolah Dasar</a></li>
  <li><a data-toggle="tab" href="#menu1a">Madrasah Ibtidaiyah</a></li>
   
  <li><a data-toggle="tab" href="#menu2">Sekolah Menengah Pertama</a></li>
  <li><a data-toggle="tab" href="#menu2a">Madrasah Tsanawiyah</a></li>
  
  
  <li><a data-toggle="tab" href="#menu3">Sekolah Menengah Atas</a></li>
  <li><a data-toggle="tab" href="#menu3a">Madrasah Aliyah</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>HOME</h3>
    <p>Some content.</p>
  </div>
  <div id="menu1" class="tab-pane fade">
    
<div class="panel panel-default"> 
	<div class="panel-heading">Data Sekolah Dasar (Total xxxxxxx) </div>
	<div class="panel-body">
		
    
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>53 <sup style="font-size: 20px"> 8,000 siswa</sup></h3>
                <p>SD Negeri</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
    
    
    
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>33 <sup style="font-size: 20px"> 80,000 siswa</sup></h3>

                <p>SD Swasta</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>44</h3>

                <p>MI Negeri</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>65</h3>

                <p>MI Swasta</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
 
    
	</div>	
  
  <div class="panel panel-warning"> 
	<div class="panel-heading">Data Sekolah Menengah Pertama </div>
	<div class="panel-body">
 	<canvas id="mycanvas1" width="256" height="256">
 
  	<script>
			$(document).ready(function(){
				var ctx = $("#mycanvas1").get(0).getContext("2d");

				//pie chart data
				//sum of values = 360
				var data = [
					{
						value: 270,
						color: "cornflowerblue",
						highlight: "lightskyblue",
						label: "Corn Flower Blue"
					},
					{
						value: 50,
						color: "lightgreen",
						highlight: "yellowgreen",
						label: "Lightgreen"
					},
					{
						value: 40,
						color: "orange",
						highlight: "darkorange",
						label: "Orange"
					}
				];

				//draw
				var piechart = new Chart(ctx).Pie(data);
			});  
      
      
		</script>
    
      
            

 </div>
</div>
 
	</div>
</div>
  </div>
  
  <div id="menu1a" class="tab-pane fade">
    
<div class="panel panel-danger"> 
	<div class="panel-heading">Data MadraSekolah Dasar (Total xxxxxxx) </div>
	<div class="panel-body">
		
    
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                 <h3>53<sup style="font-size: 20px">%</sup></h3>

                   <p>SD Negeri</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
    
    
    
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>SD Swasta</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>44</h3>

                <p>MI Negeri</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>MI Swasta</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
 
    
	</div>
  <div class="panel panel-warning"> 
	<div class="panel-heading">Data Madrasah Tsanawiyah </div>
	<div class="panel-body">
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
      
            

 </div>
</div>	
 
	</div>
</div>
  </div>  
  
  
  <div id="menu2" class="tab-pane fade">
    
<div class="panel panel-warning"> 
	<div class="panel-heading">Data Sekolah Menengah Pertama </div>
	<div class="panel-body">
		
    
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
    
    
    
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
	</div>	
 
	</div>
</div>

  </div> 
  
  
  <div id="menu2a" class="tab-pane fade">
    
<div class="panel panel-warning"> 
	<div class="panel-heading">Data Sekolah Menengah Pertama </div>
	<div class="panel-body">
		
    
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
    
    
    
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
	</div>	
  
  
  
 
	</div>
  
  
</div>

  </div>   
  
    <div id="menu3" class="tab-pane fade">
    <div class="panel panel-info"> 
	<div class="panel-heading">Data Sekolah Menengah Atas </div>
	<div class="panel-body">
		
    
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
    
    
    
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
	</div>	
  
  <div class="panel panel-warning"> 
	<div class="panel-heading">Data Sekolah Menengah Pertama </div>
	<div class="panel-body">
 	<canvas id="mycanvas" width="256" height="256">
 
  	<script>
			$(document).ready(function(){
				var ctx = $("#mycanvas").get(0).getContext("2d");

				//pie chart data
				//sum of values = 360
				var data = [
					{
						value: 270,
						color: "cornflowerblue",
						highlight: "lightskyblue",
						label: "Corn Flower Blue"
					},
					{
						value: 50,
						color: "lightgreen",
						highlight: "yellowgreen",
						label: "Lightgreen"
					},
					{
						value: 40,
						color: "orange",
						highlight: "darkorange",
						label: "Orange"
					}
				];

				//draw
				var piechart = new Chart(ctx).Pie(data);
			});  
      
      
		</script>
    
      
            

 </div>
</div>
 
	</div>
</div>

  
</div>

   <div id="menu3a" class="tab-pane fade">
    <div class="panel panel-info"> 
	<div class="panel-heading">Data Sekolah Menengah Atas </div>
	<div class="panel-body">
		
    
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info2">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
    
    
    
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info2">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info2">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info2">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
    
	</div>	
  
  <div class="panel panel-warning"> 
	<div class="panel-heading">Data Madrasah Aliyah </div>
	<div class="panel-body">
 	<canvas id="mycanvas5" width="256" height="256">
 
  	<script>
			$(document).ready(function(){
				var ctx = $("#mycanvas5").get(0).getContext("2d");

				//pie chart data
				//sum of values = 360
				var data = [
					{
						value: 200,
						color: "cornflowerblue",
						highlight: "lightskyblue",
						label: "Corn Flower Blue"
					},
					{
						value: 70,
						color: "lightgreen",
						highlight: "yellowgreen",
						label: "Lightgreen"
					},
					{
						value: 90,
						color: "orange",
						highlight: "darkorange",
						label: "Orange"
					}
				];

				//draw
				var piechart = new Chart(ctx).Pie(data);
			});  
      
      
		</script>
    
      
            

 </div>
</div>
 
	</div>
</div>

  
</div>

</div>



