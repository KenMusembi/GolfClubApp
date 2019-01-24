<!DOCTYPE html>
<html>
<head>
    <title>Golf Club App </title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
      <link rel="stylesheet" href="css/editor.dataTables.css">
      <link rel="stylesheet" href="css/editor.bootstrap.css">

      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
          <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
              <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
      <script src="{{asset('js/dataTables.editor.js')}}"></script>

      <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>

      <script src="{{asset('js/editor.bootstrap.min.js')}}"></script>
</head>
<body>


<div class="container">
    <h3 align="center">Golf Club App</h3>
    <div align="right">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button>
    </div>
    <br />
    <table id="user_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th style="width:275px" style="align:center">Action</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal of edit and add -->
<div id="userModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="user_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Add Data</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" name="name" id="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input type="email" name="email" id="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="password" id="password" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal of view -->
<div class="modal" id="view" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">View Clubs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">{{csrf_field()}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal of enroll -->
<div id="enroll" class="modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="enroll_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Enroll To Club</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enroll User</label>
                        <input type="integer" name="enroll_user_id" id="enroll_user_id" class="form-control" />
                    </div>

                    <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle Mara" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Choose Club
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <button type="button" class="dropdown-item btn btn-secondary Mara" id="club_action" value="Mara" >Mara Club</button>
    <button type="button" class="dropdown-item btn btn-secondary" id="club_action" value="Maasai" >Maasai Club</button>
    <button type="button" class="dropdown-item btn btn-secondary" id="club_action" value="Mamba" >Mamba Club</button>
  </div>
</div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" value="" />
                    <input type="hidden" name="club_action" id="club_action" value="" />
                    <input type="submit" name="enrollsubmit" id="enrollsubmit" value="Enroll" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
     $('#user_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('welcome.getdata') }}",
        "columns":[
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "action", orderable:false, searchable: false}
        ],
        "order": [[1, 'asc']]
     });

    $('#add_data').click(function(){
        $('#userModal').modal('show');
        $('#user_form')[0].reset();
        $('#form_output').html('');
        $('#button_action').val('insert');
        $('#action').val('Add');
    });

    $('#user_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"{{ route('welcome.postdata') }}",
            method:"POST",
            data:form_data,
            dataType:"json",
            success:function(data)
            {
                if(data.error.length > 0)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';

                    }
                    $('#form_output').html(error_html);
                }
                else
                {
                  toastr.success('User Data Edited', 'User Edit Succesfull')
                    $('#form_output').html(data.success);
                    $('#user_form')[0].reset();
                    $('#action').val('Add');
                    $('.modal-title').text('Add Data');
                    $('#button_action').val('insert');
                    $('#user_table').DataTable().ajax.reload();
                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
            var id = $(this).attr("id");
            $('#form_output').html('');
            $.ajax({
                url:"{{route('welcome.fetchdata')}}",
                method:'get',
                data:{id:id},
                dataType:'json',
                success:function(data)
                {
                  toastr.warning('About to Edit User, changes will be permanent', 'User Edit')
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#user_id').val(id);
                    $('#userModal').modal('show');
                    $('#action').val('Edit');
                    $('.modal-title').text('Edit Data');
                    $('#button_action').val('update');

                }
            })
        });

        $(document).on('click', '.delete', function(){
            var id = $(this).attr('id');
            if(confirm("Are you sure you want to Delete this data?"))
            {
                $.ajax({
                    url:"{{route('welcome.removedata')}}",
                    method:"get",
                    data:{id:id},
                    success:function(data)
                    {
toastr.success('User Already Deleted', 'User Deleted')
                    //  alert(data);
                      $('#user_table').DataTable().ajax.reload();

                    }
                })
            }
            else
            {
                return false;
            }
        });
/*        $('#user_table').on('click', '.view', function () {
          var id = $(this).attr('id');
          $.get("{{ URL::to('welcome/viewclubs') }}", function(data){
            console.log(data);
          })
      });
      */
      $(document).on('click', '.view', function(){
              var id = $(this).attr("id");
              $.ajax({
                  url:"{{route('welcome.viewclubs')}}",
                  method:'get',
                  data:{id:id},
                  dataType:'json',
                  success:function(data)
                  {
                    console.log(data),
toastr.success('Viewing User Clubs', 'Succesfull!')
                $('#user_name').val(data.user_name);
                $('#club_name').val(data.club_name);
                $('#action').val("view");
                $('#view').modal('show');
                $('.modal-title').text('View Clubs');
                $('#button_action').val('view');
              //  var data = $(this).serializeObject();
   //json_data = JSON.stringify(data);
  // obj= JSON.parse(json_data);
   //document.getElementById("view").innerHTML = json_data.club_name;
$(".modal-body").text(data.data[0].clubs);
}})});

$('#user_table').on( 'open.dt', function () {
toastr.info('Users are being Processsed', 'Please Wait')
} );

//addint script for enroll
$(document).on('click', '.enroll', function(){
  var id = $(this).attr("id");
         $('#form_output').html('');
         $.ajax({
             url:"{{route('welcome.enrollData')}}",
             method:'get',
             data:{id:id},
             dataType:'json',
             success:function(data)
             {
               $('#enroll_user_id').val(data.enroll_user_id);
                     $('#enroll_club_id').val(data.enroll_club_id);
                     $('#user_id').val(id);
                     $('#enroll').modal('show');
                     $('#action').val('Enroll');
                     $('.modal-title').text('Enroll');
                     //add method for taking in the club
      }

    })  });

//    $(document).on('click', '#Mara_Club', function(){
//            alert('hey');
//    })
$(document).on('click', '.Mara', function(){
        var id = $(this).attr("id");
        $('#form_output').html('');
        $.ajax({
            url:"{{route('welcome.enroll')}}",
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {

                $('#user_id').val(id);
                $('#enroll').modal('show');
                $('#action').val('Mara');
              //  $('.modal-title').text('Edit Data');
                $('#club_action').val('Mara');

            }
        })
    });



} );
    </script>
    </body>
    </html>
