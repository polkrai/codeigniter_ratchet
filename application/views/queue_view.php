<!DOCTYPE html>
<html>
<head>
    <title>Static Queue Medloading</title>

    <link rel="STYLESHEET" type="text/css" href="<?php echo BASE_URL?>assets/dhtmlx/codebase/dhtmlx.css">
    <script src="<?php echo BASE_URL?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL?>assets/js/socket.io.min-1.7.4.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL?>assets/dhtmlx/codebase/dhtmlx.js" type="text/javascript"></script>
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
<?php $med_room = array("4" => "ห้องตรวจ 14", "9" => "ห้องตรวจ 17", "5" => "ห้องตรวจ 18", "6" => "ห้องตรวจ 19", "10" => "ห้องตรวจ 20", "7" => "ห้องตรวจ 21");?>

<table>

    <thead>
    <tr style="font-family:arial,sans-serif;font-size:40px;background-color:#386587;color:#FFFFFF;line-height: 80px;">
        <?php foreach ($med_room as $key => $value):?>
            <th valign="middle" width="16.666%"><?php echo $value?></th><!-- 4 -->
        <?php endforeach;?>
    </tr>
    </thead>

    <tbody>
    <tr>
        <?php foreach ($med_room as $key => $value):?>
        <td valign="top">
            <div id="point_view_id<?php echo $key?>" style="background-color:#EBEBEB;width:300px;height:392px;"></div> <!-- border:1px solid #A4BED4;-->
            <script>
                var data_view<?php echo $key?> = new dhtmlXDataView({
                    container:"point_view_id<?php echo $key?>",
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

                window["data_view"+<?php echo $key?>].load("<?php echo site_url("api/queuedata/queues?department_id=35&point_id={$key}")?>", "json");

            </script>
        </td>

        <?php endforeach;?>

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

            if (msg.queuetype == 'requestqueue') {

                window["data_view"+msg.point_id].unselect(msg.queue_id);
                window["data_view"+msg.point_id].select(msg.queue_id);
            }
            else {

                window["data_view"+msg.point_id].load("getdata_queue.php?point_id="+msg.point_id, "json");

            }

            //console.log('Message ::: ', ev);

        });

    });

</script>

</body>
</html>
