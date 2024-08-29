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
        <h3 class="text-themecolor fw-bold">Add New User</h3>
    </div>
    <div class="addUserBox mt-4">
    
        <form method="post" action="{{ route('store_add_user') }}"  enctype="multipart/form-data">

        @csrf

        <div class="row">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="addUserInp py-2">
                            <label for="">First Name</label>
                            <input name="fname" value="{{ old('fname') }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user first name">
                            @error('fname') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Email</label>
                            <input name="email" value="{{ old('email') }}" class="inpCust py-3 d-lg-block form-control my-1" type="email" placeholder="Enter user email">
                            @error('email') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Password</label>
                            <input name="password" value="{{ old('password') }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter New Password">
                            @error('password') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Confirm Password</label>
                            <input name="password_confirmation" value="{{ old('password_confirmation') }}"  class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter New Password">
                            @error('password_confirmation') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="addUserInp py-2">
                            <label for="">Last Name</label>
                            <input name="lname" value="{{ old('lname') }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user last name">
                            @error('lname') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Select Role</label>
                            <select name="role_id" class="inpCust py-3 d-lg-block form-control my-1">
                                <option value="" disabled>-- Select Brand --</option>
                                <!-- <option value="1">Super Admin</option> -->
                                <option value="3"> User </option>
                            </select>
                            @error('role_id') <div class="error">{{ $message }}</div> @enderror
                        </div>

                        <div class="addUserInp py-2">
                            <label for="">Select Brand</label>
                            <select name="brand_id[]" class="select2 inpCust py-3 d-lg-block form-control my-1" multiple>
                                @foreach($get_brand as $key => $val_brand)
                                <option value="{{ $val_brand->brand }}"> {{ $val_brand->brand }} </option>
                                @endforeach
                            </select>
                            @error('brand_id') <div class="error">{{ $message }}</div> @enderror
                        </div>

                        <div class="addUserInp py-2">
                            <label for="">Phone Number</label>
                            <input name="phone" value="{{ old('phone') }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter Phone Number">
                            @error('phone') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        
                    </div>
                </div>
                <button class="add-user-btn font-semibold mt-4 d-table border-0" href="">Add</button>
            </div>
        </div>

        </form>

    </div>

</div>

@endsection

@section('js')



@endsection
