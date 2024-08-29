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

        <div>
            <a class="backToPageBtn" href="{{ route('leads') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to Leads</a>
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
                                    <option value="{{$val_brand->brand}}" <?php if(in_array($val_brand->brand, $selectedBrands)){ echo 'selected'; } ?> > {{ $val_brand->brand }} </option>
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

        <tbody>
            @foreach($leads as $key => $val_leads)
            <tr>
                <td><p class="d-flex align-items-center justify-content-start mb-0"> {{ $key+1 }} </p></td>
                <td><p class="d-flex align-items-center justify-content-start mb-0"> {{ $val_leads->name }} </p></td>
                <td><p class="d-flex align-items-center justify-content-start mb-0"> {{ $val_leads->email }} </p></td>
                <td><p class="d-flex align-items-center justify-content-start mb-0"> {{ $val_leads->phone }} </p></td>
                <td><p class="d-flex align-items-center justify-content-start mb-0"> {{ $val_leads->brand_name }} </p></td>
                <td><p class="d-flex align-items-center justify-content-start mb-0"> {{ getPageNameWithoutExtension($val_leads->page_url) }} </p></td>
                <td><p class="d-flex align-items-center justify-content-start mb-0"> {{ \Carbon\Carbon::parse($val_leads->created_at)->format('d-m-Y h:i:s a') }} </p></td>
                <td>
                    <p class="d-flex align-items-center gap-lg-3 gap-2 mb-0">

                        <?php if($val_leads->status == "0"){ ?>
                        <button style="width:120px;" class="table-button btn btn-primary"> Pending </button>
                        <?php }elseif($val_leads->status == "1"){ ?>
                        <button style="width:120px;" class="table-button btn btn-warning"> In Progress </button>
                        <?php }elseif($val_leads->status == "2"){ ?>
                        <button style="width:120px;" class="table-button btn btn-success"> Completed </button>
                        <?php }elseif($val_leads->status == "3"){ ?>
                        <button style="width:120px;" class="table-button btn btn-danger"> Rejected </button>
                        <?php } ?>
                        
                        <a style="width:120px; text-align:center;" href="{{ route('leads_detail', ['id' => $val_leads->uuid ]) }}" class="table-button btn-viewlead">View Lead</a>
                    </p>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

        </div>

        
    </div>


@endsection

@section('js')

<script>
    $(document).ready(function() {
       


    });
</script>

@endsection
