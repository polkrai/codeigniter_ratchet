<!DOCTYPE html>

<html>

	<head>

		<meta charset='UTF-8' />

		<title>DHTMLX Web Apps</title>

		<style>

			html,body {

				width: 100%;

				height: 100%;

				margin: 0px;

				overflow: hidden;						}

		</style>

		<link rel="stylesheet" href="codebase/dhtmlx.css">

		<script src="codebase/dhtmlx.js"></script>

		<script src="jquery.min.js"></script>

		<!-- <script src="websocket/fancywebsocket.js"></script> -->

	</head>

<body>

	<div id="myID" style="width: 800px; height: 400px"></div>

	<script type="text/javascript">

		//Define websocket server

		var Server;

		Server = new WebSocket('ws://25.9.66.162:8988');
		
		Server.onmessage = function (ev) {
			
			switch (ev.data) {

				case 'grid':
					myGrid.clearAndLoad("grid.php");
					dhtmlx.message('Information changed');
				break;

			}
			
			console.log('Message: ', ev);

	 };
	 
	 Server.onerror = function (ev) {

		console.log('Error ', ev);

	};

	//Server.connect();

	//Buat Layout untuk menempatkan Grid dan Form

	var myLayout = new dhtmlXLayoutObject({

		parent: "myID",

		pattern: "2U", //pola kiri kanan

		cells: [

			{id: "a", text: "Grid"}, //kiri

			{id: "b", text: "Form"}	//kanan

		]

	});



	//Tempatkan Grid pada myLayout a

	var myGrid = myLayout.cells("a").attachGrid();

	myGrid.setHeader("Name,\Address");

	myGrid.setColTypes("ro,ro");

	myGrid.attachHeader("#text_filter,#text_filter");

	myGrid.init();



	myGrid.load("grid.php"); //memuat data dari database ke dalam Grid

	//Event saat salah satu baris pada grid diklik

	myGrid.attachEvent("onRowSelect", function(id) {

		myForm.load("form.php?id=" + myGrid.getSelectedRowId());

	});


	//Tempatkan Form pada myLayout b

	var myForm = myLayout.cells("b").attachForm([

		{type: "fieldset", offsetLeft: 30, offsetTop: 30, label: "Form", list: [

			{type: "input", name: "nama", label: "Name", labelWidth: 80, inputWidth: 180},

			{type: "input", name: "alamat", label: "Address", labelWidth: 80, inputWidth: 180},

			{type: "block", offsetTop: 20, list: [

				{type: "button", name: "tambah", value: "Save"},

				{type: "newcolumn"},

				{type: "button", name: "hapus", value: "Delete"},

				{type: "newcolumn"},

				{type: "button", name: "simpan", value: "Edit"}

			]}

			

		]}

	]);



	var myFormDP = new dataProcessor("form.php");

		myFormDP.init(myForm);



	myForm.attachEvent("onButtonClick", function(name) {

		switch (name) {

			case "tambah":

				myForm.resetDataProcessor("inserted");

				myForm.save();	

				break;

			case "hapus":

				//myGrid.deleteSelectedRows();

				myForm.resetDataProcessor("deleted");

				myForm.setItemValue("nama", null);

				myForm.setItemValue("alamat", null);

				myForm.save();

				break;

			case "simpan":

				myForm.resetDataProcessor("updated");

				myForm.save();

				break;

		}

	});



	//Sesudah memproses

	myFormDP.attachEvent("onAfterUpdate", function(id,action,tid,tag) {

		switch (action) {

			case "deleted":

				dhtmlx.message("Data has been successfully deleted");

				myGrid.clearAndLoad("grid.php");

				Server.send('grid');

				break;

			case "inserted":

				dhtmlx.message("Data saved successfully");	

				myGrid.clearAndLoad("grid.php");

				Server.send( 'grid');

				break;

			case "updated":

				dhtmlx.message("Data has been successfully edited");

				myGrid.clearAndLoad("grid.php");

				Server.send('grid');

				break;

			case "error":

				var message = tag.firstChild.data;

				dhtmlx.message({type: "error", text: "Unable to process data <br />" + message, expire: 10000});

				myGrid.clearAndLoad("grid.php");

				break;

		}

	});

</script>

</body>