<script src="<?php print _MEDIA_URL ?>js/jquery.min.js"></script>
<script src=" <?php print _MEDIA_URL ?>js/highcharts.js"></script>
<script type="text/javascript">
  $(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Call Notification'
            },
            subtitle: {
                text: 'Source: twilio.com'
            },
            xAxis: {
                categories: [
                       <?php foreach($count_call as $each_call) {?>'<?php print  $each_call['date'];?>'<?php print',';}?>,
                    
                    
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Call'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Time(s)</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
         
                name: 'Call',
                data: [<?php foreach($count_call as $each_call) { print $each_call['total_call']; print',';}?>]
    
            }]
        });
    });
    

		
</script>
<script type="text/javascript">
  $(function () {
        $('#container_message').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Message Notification'
            },
            subtitle: {
                text: 'Source: twilio.com'
            },
            xAxis: {
                categories: [
                       <?php foreach($count_message as $each_call) {?>'<?php print  $each_call['date'];?>'<?php print',';}?>,
                    
                    
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Message'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Time(s)</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Message',
                data: [<?php  foreach($count_message as $each_message) { print $each_message['total_message']; print',';} ?>]
    
            }]
        });
    });
    

		
</script>