jQuery(document).ready(function() {

    $(".demodrop").pulsate({
        color: "#2bbce0",
        repeat: 10
    });

    $("#threads,#comments,#users").niceScroll({horizrailenabled:false,railoffset: {left:0}});

    //Date Range Picker
    $('#daterangepicker2').daterangepicker(
        {
          ranges: {
             'Today': [moment(), moment()],
             'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
             'Last 7 Days': [moment().subtract('days', 6), moment()],
             'Last 30 Days': [moment().subtract('days', 29), moment()],
             'This Month': [moment().startOf('month'), moment().endOf('month')],
             'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
          },
          opens: 'left',
          startDate: moment().subtract('days', 29),
          endDate: moment()
        },
        function(start, end) {
            $('#daterangepicker2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );



});

