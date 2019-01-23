@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif

                    You are logged in!
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Club Name</th>
                <th>Description</th>
            </tr>
        </thead>
</table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
     toastr.success("Table Data Loaded Succesfully", "Success!");
     $(document).ready(function() {
     $('#example').DataTable( {
         "processing": true,
         "serverSide": true,
         "ajax": "ClubsDataTable.php"
     } );
 } );
</script>
