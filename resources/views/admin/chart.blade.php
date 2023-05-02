<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laravel 9 Dynamic Bar Chart Example - Techsolutionstuff</title>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.1/echarts.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="col-md-12">
	<h1 class="text-center">Laravel 9 Dynamic Bar Chart Example - Techsolutionstuff</h1>
    <div class="col-md-8 col-md-offset-2">
    	<div class="col-xl-6">
    		<div class="card">
    			<div class="card-body">
    				<div class="chart-container">
    					<div class="chart has-fixed-height" id="bars_basic"></div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>	
</div>
</body>
</html>

<script>
var bars_basic_element = document.getElementById('bars_basic');
if (bars_basic_element) {
    var bars_basic = echarts.init(bars_basic_element);
    bars_basic.setOption({
        color: ['#3398DB'],
        tooltip: {
            trigger: 'axis',
            axisPointer: {            
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [
            {
                type: 'category',
                data: ['Laptop', 'Phone','Desktop'],
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: 'Total Products',
                type: 'bar',
                barWidth: '20%',
                data: [
                    {{$user_count}},
                    {{$employer_count}}, 
                    {{$admin_count}}
                ]
            }
        ]
    });
}
</script>