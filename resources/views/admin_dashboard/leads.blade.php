@extends('layouts.backend')

@section('css')
<style>

.select2-container--default .select2-selection--multiple {
    background-color: white;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: text;
    padding-bottom: 5px;
    padding-right: 5px;
    position: relative;
}

</style>
@endsection

@section('content')


<?php 

function getPageNameWithoutExtension($url) {
    
     // Parse the URL to get the path
     $parsedUrl = parse_url($url);
     $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
 
     // If the path is empty or just a single '/', set it to 'index'
     if (empty($path) || $path === '/') {
         return 'index';
     }
 
     // Remove leading '/' if present to handle cases where the path starts with '/'
     $path = ltrim($path, '/');
 
     // Get the filename and extension from the path
     $pathInfo = pathinfo($path);
     
     // Return the filename without the extension
     return isset($pathInfo['filename']) ? $pathInfo['filename'] : '';

}

?>

<div class="main-dashboard-content-parent">
        
        <div class="page-heading">
            <h3 class="text-themecolor fw-bold">Leads Lists</h3>
        </div>

        <div class="row">

            <div class="col-md-6">

            </div>
            
            <div class="col-md-6">
            
                <form action="{{route('leads_filter')}}">

                    <div class="row">

                        <div class="col-md-10">
                            <select class="select2 form-control" name="brandname[]"  multiple required>
                                @foreach($get_brand as $key => $val_brand)
                                    <option value="{{$val_brand->brand}}"> {{ $val_brand->brand }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                        
                            <button class="btn btn-primary" type="submit"> <span class="fa fa-filter"></span> filter </button>
                        
                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div class="table-card mt-4">

        <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Brand Name</th>
                <th>Page</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody id="leadsTableBody">
            <!-- Existing leads will be populated here by AJAX -->
        </tbody>

    </table>

        </div>

        
    </div>


@endsection

@section('js')


<script>
    $(document).ready(function() {
        // Fetch initial leads
        fetchLeads();

        // Function to fetch leads from the server
        function fetchLeads() {
            $.ajax({
                url: '{{ route('getLeads') }}',
                method: 'GET',
                success: function(data) {
                    $('#leadsTableBody').empty(); // Clear the table body
                    data.forEach(function(lead) {
                        appendLead(lead); // Append each lead
                    });
                }
            });
        }

        var page_without_ext = getPageNameWithoutExtension(lead.page_url);

        // Function to append a lead to the table
        function appendLead(lead) {
          
            var statusText = '';
            switch(lead.status) {
                case 0:
                    statusText = 'Pending';
                    color = 'primary';
                    break;
                case 1:
                    statusText = 'In Progress';
                    color = 'warning';
                    break;
                case 2:
                    statusText = 'Completed';
                    color = 'success';
                    break;
                case 3:
                    statusText = 'Rejected';
                    color = 'danger';
                    break;
            }

              

            var createdAt = new Date(lead.created_at);
            var formattedDate = createdAt.toLocaleString('en-US', {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            
            var url = lead.page_url;

            // Extract the last segment after the last '/'
            var lastSegment = url.split('/').pop();

            // Remove the '.php' extension
            lastSegment = lastSegment.replace('.php', '');

            if(lastSegment == "")
            {
                lastSegment = "index";
            }

            var newRow = `
                <tr>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.id}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.name}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.email}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.phone}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.brand_name}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lastSegment}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${formattedDate}</p></td>
                    <td>
                    <p class="d-flex align-items-center gap-lg-3 gap-2 mb-0">
                        <button style="width:120px;" class="table-button btn btn-${color.toLowerCase().replace(' ', '')}">${statusText}</button>
                        <a style="width:120px; text-align:center;" href="/dashboard/leads-detail/${lead.uuid}" class="table-button btn-viewlead">View Lead</a>
                    </p>
                    </td>
                </tr>`;
            $('#leadsTableBody').prepend(newRow); // Prepend new lead at the top
        }

        // Long polling function to check for new leads
        function checkForNewLeads() {
            setTimeout(function() {
                $.ajax({
                    url: '{{ route('getLeads') }}',
                    method: 'GET',
                    success: function(data) {
                        if (data.length > 0) {
                            $('#leadsTableBody').empty(); // Clear the table body
                            data.forEach(function(lead) {
                                appendLead(lead); // Append each lead
                            });
                        }
                        checkForNewLeads(); // Recursively check for new leads
                    }
                });
            }, 5000); // Check every 5 seconds
        }

        // Start the long polling
        checkForNewLeads();
    });
</script>

@endsection
