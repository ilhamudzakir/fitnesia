$(function(){        
    /* Line access */
    var report_access = Morris.Line({
        element: 'dashboard-access',
        data: [],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Total Access'],
        resize: true,
        hideHover: true,
        xLabels: 'month',
        gridTextSize: '10px',
        lineColors: ['#33414E'],
        gridLineColor: '#E5E5E5'
    });
    
    function get_line_chart_access(status = 0)
    {
        $.ajax({
            url:'admin/get_data_access',
            type:'post',
            dataType:'json',
            data:{'status':status},
            success:function(response)
            {
                if(response.status == 'ok')
                {
                    var array_data = [];
                    $.each(response.data, function(i, item){
                        array_data.push({y:item.date, a:item.counter});
                    });
                    if(status == 1)
                        $('#report-text-access').html('All Time');
                    else if(status == 2)
                        $('#report-text-access').html('Monthly');
                    else if(status == 1)
                        $('#report-text-access').html('Daily');
                    report_access.setData(array_data);
                }
            }
        });
    }
    get_line_chart_access();
    
    $('.change-chart-access').click(function(){
        var status = $(this).attr('data-status');
        get_line_chart_access(status);
    });
    
    /* Line visitor */
    var report_visitor = Morris.Line({
        element: 'dashboard-visitor',
        data: [],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Total Visitor'],
        resize: true,
        hideHover: true,
        xLabels: 'month',
        gridTextSize: '10px',
        lineColors: ['#B04443'],
        gridLineColor: '#E5E5E5'
    });
    
    function get_line_chart_visitor(status = 0)
    {
        $.ajax({
            url:'admin/get_data_visitor',
            type:'post',
            dataType:'json',
            data:{'status':status},
            success:function(response)
            {
                if(response.status == 'ok')
                {
                    var array_data = [];
                    $.each(response.data, function(i, item){
                        array_data.push({y:item.date, a:item.counter});
                    });
                    if(status == 1)
                        $('#report-text-visitor').html('All Time');
                    else if(status == 2)
                        $('#report-text-visitor').html('Monthly');
                    else if(status == 1)
                        $('#report-text-visitor').html('Daily');
                    report_visitor.setData(array_data);
                }
            }
        });
    }
    get_line_chart_visitor();
    
    $('.change-chart-visitor').click(function(){
        var status = $(this).attr('data-status');
        get_line_chart_visitor(status);
    });
});

