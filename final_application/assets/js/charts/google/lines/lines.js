/* ------------------------------------------------------------------------------
 *
 *  # Google Visualization - lines
 *
 *  Google Visualization line chart demonstration
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */


// Line chart
// ------------------------------

// Initialize chart
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawLineChart);


// Chart settings
function drawLineChart() {

    // Data
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Booking', 'Cancellation'],
        ['Jan',  1000,      400],
        ['Feb',  1170,      460],
        ['Mar',  660,       1120],
        ['Apr',  1030,      540],
        ['May',  2000,      540],
        ['Jun',  520,      540],
        ['Jul',  300,      540],
        ['Aug',  2120,      540],
        ['Sep',  870,      540],
        ['Oct',  980,      540],
        ['Nov',  200,      540],
        ['Dec',  1030,      540],
    ]);

    // Options
    var options = {
        fontName: 'Roboto',
        height: 400,
        curveType: 'function',
        fontSize: 12,
        chartArea: {
            left: '5%',
            width: '90%',
            height: 350
        },
        pointSize: 4,
        tooltip: {
            textStyle: {
                fontName: 'Roboto',
                fontSize: 13
            }
        },
        vAxis: {
            title: 'BooKing & Cancellation Report',
            titleTextStyle: {
                fontSize: 13,
                italic: false
            },
            gridlines:{
                color: '#e5e5e5',
                count: 10
            },
            minValue: 0
        },
        legend: {
            position: 'top',
            alignment: 'center',
            textStyle: {
                fontSize: 12
            }
        }
    };

    // Draw chart
    var line_chart = new google.visualization.LineChart($('#google-line')[0]);
    line_chart.draw(data, options);
}


// Resize chart
// ------------------------------

$(function () {

    // Resize chart on sidebar width change and window resize
    $(window).on('resize', resize);
    $(".sidebar-control").on('click', resize);

    // Resize function
    function resize() {
        drawLineChart();
    }
});
