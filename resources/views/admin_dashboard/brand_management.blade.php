@extends('layouts.backend')

@section('css')
<style>

.active_span{

background: #b2ffad;
padding: 5px;
border-radius: 5px;

}

.inactive_span{

background: #ffbfbf;
padding: 5px;
border-radius: 5px;

}


.img_class{
    height: 50px;
    width: 100px;
    border: 1px solid #000;
    border-radius: 5px;
    object-fit: contain; 
    padding-inline: 8px;
}


</style>
@endsection

@section('content')

<?php 

  // if(\App\Services\PermissionChecker::checkPermission('Listing', 'Leads')){ echo ''; }else{ echo ''; }
  
?>

<div class="main-dashboard-content-parent">
    <div class="page-heading d-flex align-items-center justify-content-between">
        <h3 class="text-themecolor fw-bold">Brand Management</h3>
        <a class="add-user-btn font-semibold" href="{{ route('add_brand') }}">Add New Brand</a>
    </div>

    <div class="table-card mt-4">

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Created At</th>
            <th>Logo</th>
            <th>Status</th>
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>


        @foreach($get_all_brand as $key => $value)
        <tr>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> {{ $key + 1 }} </p>
            </td>
            
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> {{ $value->brand }} </p>
            </td>

            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> {{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y H:i:s a') }} </p>
            </td>
            
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> 

                    <?php if($value->brand_logo != null || $value->brand_logo != ''){ ?>
                        <img src="{{ asset($value->brand_logo) }}" style="" class="img_class" />
                    <?php }else{ ?>
                        <img src="{{ asset('empty.png') }}" style=""  class="img_class"/>
                    <?php } ?>
                </p>
            </td>

            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> <span class="<?php if($value->status == "1"){ echo 'active_span'; }else{ echo 'inactive_span'; } ?>" > <?php if($value->status == "1"){ echo 'Active'; }else{ echo 'InActive'; } ?>  </span> </p>
            </td>
                
            
            
            <td>
                <p class="d-flex align-items-center gap-lg-3 gap-2 mb-0">
                    
                    <a href="{{ route('edit_brand', ['id' => $value->uuid]) }}" class="table-button btn-edit-user">Edit </a>
                    <!-- <a href="{{ route('delete_brand', ['id' => $value->uuid]) }}" onclick="return confirm('are you sure?')" class="table-button btn-delete">Delete</a> -->

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
<script type="text/javascript">
    
    
</script>
@endsection
