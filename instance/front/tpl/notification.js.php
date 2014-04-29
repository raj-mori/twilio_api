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
                    'Mon',
                    'Tue',
                    'Wen',
                    'Thu',
                    'Fri',
                    'Sat',
                    'Sun'
                    
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Call/Message'
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
                data: [1,4,3,9,5,6,7]
    
            }, {
                name: 'Message',
                data: [7,6,5,8,3,2,3]
    
            }]
        });
    });
    

		
</script>