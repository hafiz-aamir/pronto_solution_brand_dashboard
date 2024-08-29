@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')

<?php
 
use App\Models\Lead;
use Carbon\Carbon;

$year  = "";
$month = "";

if(isset($_GET['month_year']))
{
    
    $month_year = $_GET['month_year'];
    list($month, $year) = explode('-', $month_year);

}
else{

    $year  = date('Y');
    $month = date('m');

}


if(Auth::user()->role_id == "2")
{

    $get_pending_leads1 = Lead::where('status', '0')->count();
    $get_inprogress_leads1 = Lead::where('status', '1')->count();
    $get_completed_leads1 = Lead::where('status', '2')->count();
    $get_rejected_leads1 = Lead::where('status', '3')->count();


    $get_pending_leads = Lead::where('status', '0')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
    $get_inprogress_leads = Lead::where('status', '1')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
    $get_completed_leads = Lead::where('status', '2')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
    $get_rejected_leads = Lead::where('status', '3')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();


}
elseif(Auth::user()->role_id == "3")
{
    
    $selectedBrandIds = explode(',', Auth::user()->brand_id); 

    $get_pending_leads1 = Lead::whereIn('brand_name', $selectedBrandIds)->where('status', '0')->count();
    $get_inprogress_leads1 = Lead::whereIn('brand_name', $selectedBrandIds)->where('status', '1')->count();
    $get_completed_leads1 = Lead::whereIn('brand_name', $selectedBrandIds)->where('status', '2')->count();
    $get_rejected_leads1 = Lead::whereIn('brand_name', $selectedBrandIds)->where('status', '3')->count();


    $get_pending_leads = Lead::whereIn('brand_name', $selectedBrandIds)->where('status', '0')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
    $get_inprogress_leads = Lead::whereIn('brand_name', $selectedBrandIds)->where('status', '1')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
    $get_completed_leads = Lead::whereIn('brand_name', $selectedBrandIds)->where('status', '2')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
    $get_rejected_leads = Lead::whereIn('brand_name', $selectedBrandIds)->where('status', '3')->whereYear('created_at', $year)->whereMonth('created_at', $month)->count();

}



$dataPoints = array( 
	array("y" => $get_pending_leads, "label" => "Pending" ),
	array("y" => $get_inprogress_leads, "label" => "Inprogress" ),
	array("y" => $get_completed_leads, "label" => "Completed" ),
	array("y" => $get_rejected_leads, "label" => "Rejected" ),
);
 
?>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Current Month Leads"
	},
	axisY: {
		title: "Current Month Leads"
	},
	data: [{
		type: "spline",
        indexLabel: "{y}",
		yValueFormatString: "#,##0.## Leads",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div class="main-dashboard-content-parent">
    <div class="page-heading">
        <h3 class="text-themecolor fw-bold">Welcome, {{ Auth::user()->fname }} {{ Auth::user()->lname }} </h3>
    </div>

    <div class="row mt-4">
        <div class="col-lg-3 mt-md-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Pending</span>
                    <span class="fs-28px fw-bold"> {{ $get_pending_leads1 }} </span>
                    <!-- <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">12</span> New Leads
                        Today.</span> -->
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-1.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-3 mt-md-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Inprogress</span>
                    <span class="fs-28px fw-bold"> {{ $get_inprogress_leads1 }} </span>
                    <!-- <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">6</span> New Leads Assigned to
                        you.</span> -->
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-2.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-3 mt-lg-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Completed</span>
                    <span class="fs-28px fw-bold"> {{ $get_completed_leads1 }} </span>
                    <!-- <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">5</span> More Leads
                        Completed.</span> -->
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-3.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-3 mt-lg-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Rejected</span>
                    <span class="fs-28px fw-bold"> {{ $get_rejected_leads1 }} </span>
                    <!-- <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">5</span> More Leads Started by
                        you.</span> -->
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-4.png') }}" alt="">
            </div>
        </div>
    </div>  

    <div class="addUserBox card mt-4">
        
        <div class="col-md-4 d-flex">
            
            <span style="border: 1px solid #a9adb3;  padding: 10px; border-radius: 5px;" class="fa fa-filter"></span>
            <select style="border: 1px solid #9babc5;" name="month_year" id="month_year" onchange="redirectToDashboard()" class="form-control">
                
                <?php
                
                    // Get the current year and month
                    $currentYear = date('Y');
                    $currentMonth = date('m');
                    
                    // Get selected month and year from query parameters if available
                    $selectedMonthYear = isset($_GET['month_year']) ? $_GET['month_year'] : null;
                    $selectedMonth = $selectedMonthYear ? explode('-', $selectedMonthYear)[0] : $currentMonth;
                    $selectedYear = $selectedMonthYear ? explode('-', $selectedMonthYear)[1] : $currentYear;

                    // Generate options for each month
                    for ($month = 1; $month <= 12; $month++) {
                        $formattedMonth = str_pad($month, 2, '0', STR_PAD_LEFT);
                        $monthYear = "$formattedMonth-$currentYear";
                        $selected = ($formattedMonth == $selectedMonth && $currentYear == $selectedYear) ? ' selected' : '';
                        echo "<option value=\"$monthYear\"$selected>" . date('F', mktime(0, 0, 0, $month, 1)) . " $currentYear</option>\n";
                    }
                ?>

            </select>

        </div>
        

        <br><br>

        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>

</div>


@endsection

@section('js')

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script>

    function redirectToDashboard() {
        // Get the selected value
        var selectElement = document.getElementById('month_year');
        var selectedValue = selectElement.value;
        
        // Redirect to the route with the selected value as query parameters
        if (selectedValue) {
            window.location.href = "{{ route('dashboard') }}?month_year=" + encodeURIComponent(selectedValue);
        } else {
            window.location.href = "{{ route('dashboard') }}";
        }
    }

</script>

@endsection
