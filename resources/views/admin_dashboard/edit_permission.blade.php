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
        <a class="backToPageBtn" href="{{ route('user_management') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to User Management</a>
    </div>
    <!-- <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Edit Permission</h3>
    </div> -->
    <div class="addUserBox mt-4">
      
        <div class="container">
        <h2>Permission Management</h2>
        <form action="/save-permissions" method="POST">

            <div class="row">

                @foreach($module as $key => $value_module)
                
                <div class="col-md-6">

                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0">{{ $value_module->name }} Module</h5>
                        </div>
                        <div class="card-body">
                            <!-- Switches for Permissions -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="1" id="permission1">
                                <label class="form-check-label" for="permission1">View Leads</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="2" id="permission2">
                                <label class="form-check-label" for="permission2">Add Leads</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="3" id="permission3">
                                <label class="form-check-label" for="permission3">Update Leads</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="4" id="permission4">
                                <label class="form-check-label" for="permission4">Delete Leads</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="5" id="permission5">
                                <label class="form-check-label" for="permission5">Listing Leads</label>
                            </div>
                            
                        </div>
                    </div>

                </div>
                @endforeach

            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save Permissions</button>

        </form>
    </div>

    </div>

</div>

@endsection

@section('js')
<script type="text/javascript">
    
    
</script>
@endsection
