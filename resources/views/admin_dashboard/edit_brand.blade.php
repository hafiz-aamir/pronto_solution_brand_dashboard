@extends('layouts.backend')

@section('css')
<style>

.img_class{

    border: 1px solid #000; 
    height: 100px; 
    width: 200px; 
    border-radius: 10px;

}

</style>
@endsection

@section('content')

<?php 

  // if(\App\Services\PermissionChecker::checkPermission('Listing', 'Leads')){ echo ''; }else{ echo ''; }
  
?>

<div class="main-dashboard-content-parent">
    <div>
        <a class="backToPageBtn" href="{{ route('brand_management') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to User Management</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Edit Brand</h3>
    </div>
    <div class="addUserBox mt-4">
        
        <form method="post" action="{{ route('update_brand') }}" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <div class="col-lg-12">

                        <div class="row">
                            <div class="col-lg-6">
                                
                                <div class="addUserInp py-2">
                                    <label for="">Brand Name</label>
                                    <input name="brand" value="{{ $get_brand->brand }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" >
                                    @error('brand') <div class="error">{{ $message }}</div> @enderror
                                    
                                    <input type="hidden" name="id" value="{{ $get_brand->id }}">

                                </div>
                                
                            </div>

                            <div class="col-lg-6">
                                <div class="addUserInp py-2">
                                    <label for="">Select Status</label>
                                    <select name="status" class="inpCust py-3 d-lg-block form-control my-1">
                                        <option value="1" disabled selected>-- Select Status --</option>
                                        <option <?php if($get_brand->status == "1"){ echo 'selected'; } ?> value="1">Active</option>
                                        <option <?php if($get_brand->status == "0"){ echo 'selected'; } ?> value="0">InActive</option>
                                    </select>
                                </div>
                                
                            </div>

                            
                            <div class="col-lg-6">

                                <div class="addUserInp py-2">
                                    <label for="">Brand Logo</label>
                                    <input name="brand_logo" id="brand_logo" value="{{ old('brand_logo') }}" class="inpCust py-3 d-lg-block form-control my-1" type="file">
                                    @error('brand_logo') <div class="error">{{ $message }}</div> @enderror
                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="addUserInp py-2">
                                    <img src="{{ asset($get_brand->brand_logo) }}" id="img_selected" alt="{{ $get_brand->brand }}" class="img_class"/>
                                </div>

                            </div>
                            

                        </div>

                        <button  class="add-user-btn font-semibold mt-4 d-table border-0">Update</button>

                </div>
            </div>

        </form>

    </div>

</div>

@endsection

@section('js')
<script>

    document.getElementById('brand_logo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('img_selected');
                img.src = e.target.result;
                img.style.display = 'block'; // Show the image
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById('img_selected').style.display = 'none'; // Hide the image if no file selected
        }
    });

</script>
@endsection
