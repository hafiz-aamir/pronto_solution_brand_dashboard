@extends('layouts.backend')

@section('css')
<style>

.error {
    color: red;
}

.select2-container .select2-selection--multiple {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    min-height: 50px !important;
    user-select: none;
    -webkit-user-select: none;
}

.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid black 1px;
    outline: 0;
    padding: 5px !important;
}

</style>
@endsection

@section('content')

<?php 

  // if(\App\Services\PermissionChecker::checkPermission('Listing', 'Leads')){ echo ''; }else{ echo ''; }
  
?>

<div class="main-dashboard-content-parent">
    <div>
        <a class="backToPageBtn" href="{{ route('user_management') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to User Management</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Edit User</h3>
    </div>
    <div class="addUserBox mt-4">
        
        <form method="post" action="{{ route('update_user') }}">

            @csrf

            <div class="row">
                <div class="col-lg-10">

                        <div class="row">
                            <div class="col-lg-6">

                                <input type="hidden" name="id" value="{{ $get_user->id }}">

                                <div class="addUserInp py-2">
                                    <label for="">First Name</label>
                                    <input name="fname" value="{{ $get_user->fname }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user first name">
                                    @error('fname') <div class="error">{{ $message }}</div> @enderror
                                </div>
                                <div class="addUserInp py-2">
                                    <label for="">Email</label>
                                    <input name="email" value="{{ $get_user->email }}" class="inpCust py-3 d-lg-block form-control my-1" type="email" placeholder="Enter user email">
                                    @error('email') <div class="error">{{ $message }}</div> @enderror
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="addUserInp py-2">
                                    <label for="">Last Name</label>
                                    <input name="lname" value="{{ $get_user->lname }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user last name">
                                    @error('lname') <div class="error">{{ $message }}</div> @enderror
                                </div>
                               
                                <div class="addUserInp py-2">
                                    <label for="">Phone Number</label>
                                    <input name="phone" value="{{ $get_user->phone }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user last name">
                                    @error('phone') <div class="error">{{ $message }}</div> @enderror
                                </div>
                                
                                
                                
                            </div>


                            @if(Auth::user()->role_id == "2")
                            <div class="col-lg-6">
                                <div class="addUserInp py-2">
                                    <label for="">Select Status</label>
                                    <select name="status" class="inpCust py-3 d-lg-block form-control my-1">
                                        <option value="1" disabled selected>-- Select Status --</option>
                                        <option <?php if($get_user->status == "1"){ echo 'selected'; } ?> value="1">Active</option>
                                        <option <?php if($get_user->status == "0"){ echo 'selected'; } ?> value="0">InActive</option>
                                    </select>
                                    @error('status') <div class="error">{{ $message }}</div> @enderror
                                    
                                </div>
                                
                            </div>

                            <?php $selectedBrandIds = explode(',', $get_user->brand_id);  ?>

                            <div class="col-lg-6">

                                <div class="addUserInp py-2">
                                    <label for="">Select Brand</label>
                                    <select name="brand_id[]" class="select2 inpCust py-3 d-lg-block form-control my-1" multiple>
                                        @foreach($get_brand as $key => $val_brand)
                                            <option value="{{ $val_brand->brand }}" <?php if(in_array($val_brand->brand, $selectedBrandIds)){ echo 'selected'; } ?>>
                                                {{ $val_brand->brand }}
                                            </option>
                                        @endforeach
                                    </select> 
                                    @error('brand_id') <div class="error">{{ $message }}</div> @enderror 
                                </div>


                            </div>
                            @endif

                            

                        </div>

                        <button type="submit" class="add-user-btn font-semibold mt-4 d-table border-0">Update</button>

                </div>
            </div>

        </form>

    </div>

</div>

@endsection

@section('js')

@endsection
