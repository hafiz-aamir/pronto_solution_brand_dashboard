@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')

<?php 

  // if(\App\Services\PermissionChecker::checkPermission('Listing', 'Leads')){ echo ''; }else{ echo ''; }
  
?>

<div class="main-dashboard-content-parent">
    <div>
        <a class="backToPageBtn" href="{{ route('leads') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to Lead List</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Leads Detail</h3>
    </div>
    <div class="boxLeadDetail mt-4">
        <form action="" method="POST">
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">ID</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->id }}"  name="id" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">First Name</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->name }}" name="name" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Email</label>
                <div class="col-md-5">
                    <input type="email" class="form-control inpCust" value="{{ $get_lead_by_id->email }}" name="email" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Phone Number</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->phone }}" name="phone" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Message</label>
                <div class="col-md-5">
                    <textarea name="message" class="form-control inpCust" rows="3" readonly> {{ $get_lead_by_id->message }} </textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Created At</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="{{ \Carbon\Carbon::parse($get_lead_by_id->created_at)->format('Y-m-d H:i:s a') }}" name="created_at" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Brand Name</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->brand_name }}" name="brand_name" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Page URL</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->page_url }}" name="page_url" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">IP Address</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="{{ $get_lead_by_id->ip }}" readonly name="ip">
                </div>
            </div>
            <div class="btn-group d-flex justify-content-end">
                <!-- <button class="printPdfBtn me-2"><i class="fa fa-print"></i></button> -->
                <div class="dropdown">
                    
                        <?php 
                        
                        if($get_lead_by_id->status == "0")
                        {
                           echo '<button class="btn btn-primary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false"> Pending </button>';
                        }
                        else if($get_lead_by_id->status == "1")
                        {
                            echo '<button class="btn btn-warning dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false"> Inprogress </button>';
                        }
                        else if($get_lead_by_id->status == "2")
                        {
                            echo '<button class="btn btn-success dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false"> Completed </button>';
                        }
                        else if($get_lead_by_id->status == "3")
                        {
                            echo '<button class="btn btn-danger dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false"> Rejected </button>';
                        }
                        
                        ?>

                    <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                        <li><a class="dropdown-item" href="{{ route('update_leads_detail', ['id' => $get_lead_by_id->id, 'status' => '0']) }}">Pending</a></li>
                        <li><a class="dropdown-item" href="{{ route('update_leads_detail', ['id' => $get_lead_by_id->id, 'status' => '1']) }}">Inprogress</a></li>
                        <li><a class="dropdown-item" href="{{ route('update_leads_detail', ['id' => $get_lead_by_id->id, 'status' => '2']) }}">Completed</a></li>
                        <li><a class="dropdown-item" href="{{ route('update_leads_detail', ['id' => $get_lead_by_id->id, 'status' => '3']) }}">Rejected</a></li>
                    </ul>

                </div>
            </div>
        </form>
    </div>

</div>


@endsection

@section('js')
<script type="text/javascript">
    
    
</script>
@endsection
