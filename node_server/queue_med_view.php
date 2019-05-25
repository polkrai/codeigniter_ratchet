<!DOCTYPE html>
<html>
<head>
	<title>Static Queue Medloading</title>

	<link rel="STYLESHEET" type="text/css" href="../dhtmlx/codebase/dhtmlx.css">
	<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="../assets/js/socket.io.min-1.7.4.js" type="text/javascript"></script>
	<!--  <script src="http://25.9.66.162:1337/socket.io/socket.io.js"></script>  -->
	<script src="../dhtmlx/codebase/dhtmlx.js" type="text/javascript"></script>
  	<!-- <script src="../assets/js/get_ip.js" type="text/javascript"></script> -->
	
	<style type="text/css" media="screen">
		
		body, html{
			background-color:#EBEBEB;
		    margin:0;
		    padding:0;
		}
		
		.divbg {
            background: #575552 !important;
        }
		
		.dhx_dataview_item .dhx_light {
			
			color: #FFFFFF;
		}
		
		.dhx_dataview_default_item_selected {
		    background-color: #FF0000;
		    background-repeat: repeat-x;
		    border-color: #FF0000;
		    color: #b5deff;
		}
		
		.dhx_dataview_item {
		    color: #FFFFFF;
		    font-family: arial,sans-serif;
		    font-size: 12px;
		}
		
		.dhx_dataview_default_item {
		    background-color: #575552;
		    cursor: pointer;
		}
		
		table, td, th {  
			border: 1px solid #EBEBEB;
		}
		
		table {
			border-collapse: collapse;
			width: 100%;
		}
	</style>
</head>
<body>
	<!--<h1>Queue loading</h1>-->
	
	<table>
	
		<thead>
			<tr style="font-family:arial,sans-serif;font-size:40px;background-color:#386587;color:#FFFFFF;line-height: 80px;">
				<th valign="middle" width="16.666%">ห้องตรวจ 14</th><!-- 4 -->
			  	<th width="16.666%">ห้องตรวจ 17</th><!-- 9 -->
			  	<th width="16.666%">ห้องตรวจ 18</th><!-- 5 -->
			  	<th width="16.666%">ห้องตรวจ 19</th><!-- 6 -->
			  	<th width="16.666%">ห้องตรวจ 20</th><!-- 10 -->
			  	<th width="16.666%">ห้องตรวจ 21</th><!-- 7 -->
			</tr>
		</thead>
		
		<tbody>	
			<tr>
				<td valign="top">		
					<div id="point_view_id4" style="background-color:#EBEBEB;width:300px;height:392px;"></div> <!-- border:1px solid #A4BED4;-->									
					<script>			
						var data_view4 = new dhtmlXDataView({
							container:"point_view_id4",
							height:"auto",
							type:{
								//template:"<span class='dhx_strong'>{obj.queue_number}</span>{obj.Package} <span class='dhx_light'>{obj.Version}</span>",
								template:"<span class='dhx_strong' style='font-size:90px;'><center>{obj.queue_number}</center></span> <span class='dhx_light' style='font-family:arial,sans-serif;font-size:30px;'>ระยะเวลารอ : </span>",
								height:140,
								//width:"auto"
								width:300
							},
							//autowidth:1,
						});
						
						data_view4.load("getdata_queue.php?point_id=4", "json", function(){
							
							//data_view4.select(data_view4.first());
						});
					
					</script>
				</td>		
				
				<td valign="top">		
					<div id="point_view_id9" style="background-color:#EBEBEB; width:300px;height:392px;"></div> <!-- border:1px solid #A4BED4;-->					
					<script>				
						var data_view9 = new dhtmlXDataView({
							container:"point_view_id9",
							height:"auto",
							type:{
								//template:"<span class='dhx_strong'><center>{obj.queue_number}</center></span>{obj.Package} <span class='dhx_light'>{obj.Version}</span>",
								template:"<span class='dhx_strong' style='font-size:90px;'><center>{obj.queue_number}</center></span> <span class='dhx_light' style='font-family:arial,sans-serif;font-size:30px;'>ระยะเวลารอ : </span>",
								height:140,
								//width:"auto"
								width:300
							},
							//autowidth:1,
						});
						
						data_view9.load("getdata_queue.php?point_id=9", "json", function(){
							
							//data_view9.select(data_view9.first());
						});
					</script>				
				</td>
				
				<td valign="top">		
					<div id="point_view_id5" style="background-color:#EBEBEB; width:300px;height:392px;"></div> <!-- border:1px solid #A4BED4;-->					
					<script>				
						var data_view5 = new dhtmlXDataView({
							container:"point_view_id5",
							height:"auto",
							type:{
								//template:"<span class='dhx_strong'><center>{obj.queue_number}</center></span>{obj.Package} <span class='dhx_light'>{obj.Version}</span>",
								template:"<span class='dhx_strong' style='font-size:90px;'><center>{obj.queue_number}</center></span> <span class='dhx_light' style='font-family:arial,sans-serif;font-size:30px;'>ระยะเวลารอ : </span>",
								height:140,
								//width:"auto"
								width:300
							},
							//autowidth:1,
						});
						
						data_view5.load("getdata_queue.php?point_id=5", "json", function(){
							
							//data_view5.select(data_view5.first());
						});
					</script>				
				</td>
				
				<td valign="top">		
					<div id="point_view_id6" style="background-color:#EBEBEB; width:300px;height:392px;"></div> <!-- border:1px solid #A4BED4;-->					
					<script>				
						var data_view6 = new dhtmlXDataView({
							container:"point_view_id6",
							height:"auto",
							type:{
								//template:"<span class='dhx_strong'><center>{obj.queue_number}</center></span>{obj.Package} <span class='dhx_light'>{obj.Version}</span>",
								template:"<span class='dhx_strong' style='font-size:90px;'><center>{obj.queue_number}</center></span> <span class='dhx_light' style='font-family:arial,sans-serif;font-size:30px;'>ระยะเวลารอ : </span>",
								height:140,
								//width:"auto"
								width:300
							},
							//autowidth:1,
						});
						
						data_view6.load("getdata_queue.php?point_id=6", "json", function(){
							
							//data_view6.select(data_view6.first());
						});
					</script>				
				</td>
				
				<td valign="top">		
					<div id="point_view_id10" style="background-color:#EBEBEB; width:300px;height:392px;"></div> <!-- border:1px solid #A4BED4;-->					
					<script>				
						var data_view10 = new dhtmlXDataView({
							container:"point_view_id10",
							height:"auto",
							type:{
								//template:"<span class='dhx_strong'><center>{obj.queue_number}</center></span>{obj.Package} <span class='dhx_light'>{obj.Version}</span>",
								template:"<span class='dhx_strong' style='font-size:90px;'><center>{obj.queue_number}</center></span> <span class='dhx_light' style='font-family:arial,sans-serif;font-size:30px;'>ระยะเวลารอ : </span>",
								height:140,
								//width:"auto"
								width:300
							},
							//autowidth:1,
						});
						
						data_view10.load("getdata_queue.php?point_id=10", "json", function(){
							
							//data_view10.select(data_view10.first());
						});
					</script>				
				</td>
				
				<td valign="top">		
					<div id="point_view_id7" style="background-color:#EBEBEB; width:300px;height:392px;"></div> <!-- border:1px solid #A4BED4;-->					
					<script>				
						var data_view7 = new dhtmlXDataView({
							container:"point_view_id7",
							height:"auto",
							type:{
								//template:"<span class='dhx_strong'><center>{obj.queue_number}</center></span>{obj.Package} <span class='dhx_light'>{obj.Version}</span>",
								template:"<span class='dhx_strong' style='font-size:90px;'><center>{obj.queue_number}</center></span> <span class='dhx_light' style='font-family:arial,sans-serif;font-size:30px;'>ระยะเวลารอ : </span>",
								height:140,
								//width:"auto"
								width:300
							},
							//autowidth:1,
						});
						
						data_view7.load("getdata_queue.php?point_id=7", "json", function(){
							
							//data_view7.select(data_view7.first());
						});
					</script>				
				</td>
				
			</tr>
			
		</tbody>
		
	</table>
	
	<script type="text/javascript">
		
		function blinkMessage() {
			
            $(".dhx_dataview_default_item_selected").toggleClass("divbg");
        }
        
        var blink = null;
            //$("#btntoggle").on("click", function () {
                if (blink == null)
                    blink = setInterval(blinkMessage, 500);
            //});

		$(function () {
			
			var group = "med" !== undefined ? "broadcast":"med";
			
			//alert(group);
			
			//var server = "//<?php echo $_SERVER['SERVER_ADDR'];?>:1337";

			var websocket = io('http://<?php echo ($_SERVER['SERVER_ADDR'] == "::1")?"localhost":$_SERVER['SERVER_ADDR'];?>:1337');
			
			//Message Received
			websocket.on(group, function(msg){
				
				//var json = JSON.parse(ev.data);
				
				//alert(msg.queue_id);
				
				//alert(msg.queuetype);
				
				//var view = "data_view" + msg.point_id;
				
				if (msg.queuetype == 'reuest') {
				
					if (msg.point_id == '4') {
						
						data_view4.unselect(msg.queue_id);				
						data_view4.select(msg.queue_id);
					}
					else if (msg.point_id == '9') {
						
						data_view9.unselect(msg.queue_id);				
						data_view9.select(msg.queue_id);
					}
					else if (msg.point_id == '5') {
						
						data_view5.unselect(msg.queue_id);				
						data_view5.select(msg.queue_id);
					}
					else if (msg.point_id == '6') {
						
						data_view6.unselect(msg.queue_id);				
						data_view6.select(msg.queue_id);
					}
					else if (msg.point_id == '10') {
						
						data_view10.unselect(msg.queue_id);				
						data_view10.select(msg.queue_id);
					}
					else if (msg.point_id == '7') {
						
						data_view7.unselect(msg.queue_id);				
						data_view7.select(msg.queue_id);
					}
				}
				else {
					
					if (msg.point_id == '4') {
						
						data_view4.load("getdata_queue.php?point_id="+msg.point_id, "json");
					}
					else if (msg.point_id == '9') {
						
						data_view9.load("getdata_queue.php?point_id="+msg.point_id, "json");
					}
					else if (msg.point_id == '5') {
						
						data_view5.load("getdata_queue.php?point_id="+msg.point_id, "json");
					}
					else if (msg.point_id == '6') {
						
						data_view6.load("getdata_queue.php?point_id="+msg.point_id, "json");
					}
					else if (msg.point_id == '10') {
						
						data_view10.load("getdata_queue.php?point_id="+msg.point_id, "json");
					}
					else if (msg.point_id == '7') {
						
						data_view7.load("getdata_queue.php?point_id="+msg.point_id, "json");
					}

				}
			
				//console.log('Message ::: ', ev);

			});		

		});

	</script>

</body>
</html>
