<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="jquery.min.js"></script>
    <script src="highcharts.js"></script>
    
</head>
<script>
    var chart;
    $(function(){
        chart = new Highcharts.Chart({
            chart:{
                renderTo:"container",
                type:"bar"
            },
            title:{
                text:"今日降雨量"
            },
            xAxis:{
                categories:['a','b','c','d']
            },
            yAxis:{
                min:0,
                title:{
                    text:"Rain"
                },
                label:{
                    overflow:'justify'
                }
            },
            series:[{
                name:"Four hours",
                data:[18,20,28,39]
            },{
                name:"One hour",
                data:[9,0,25,35]
            }]
        });
    })
</script>
<body>
    <div id="container" style="width:800px;height:400px;">

    </div>
</body>
</html>