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

      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
          <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
              <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>

      <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
       </head>
<body>

<div class="container">
    <h4 align="center">Golf Club App</h4>
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
                   <p>Once you click a checkbox, the user will be enrolled to that Club.</p>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enroll User</label>
                        <input type="hidden" name="enroll_user_id" id="enroll_user_id" class="form-control" />
                    </div>
  <!--                  <button type="button" class="dropdown-item btn btn-info Mara" id="Mara" value="Mara" >Mara Club</button>
                    <button type="button" class="dropdown-item btn btn-info Maasai" id="Maasai" value="Maasai" >Maasai Club</button>
                    <button type="button" class="dropdown-item btn btn-info Mamba" id="Mamba" value="Mamba" >Mamba Club</button> -->
<br>
<input type="checkbox" name="feature1" class="Mara"  id="Mara" value="Mara" checked=''><label>Mara</label><br>
<input type="checkbox" name="feature1" class="Maasai"  id="Maasai" value="Maasai" ><label>Maasai</label><br>
<input type="checkbox" name="feature1" class="Mamba"  id="Mamba" value="Mamba" ><label>Mamba</label><br>
<input type="checkbox" name="feature1" class="Samburu"  id="Samburu" value="Samburu" ><label>Samburu</label><br>
<input type="checkbox" name="feature1" class="Olive"  id="Olive" value="Olive" ><label>Olive</label><br>
<input type="checkbox" name="feature1" class="Razors"  id="Razors" value="Razors" ><label>Razors</label><br>
<input type="checkbox" name="feature1" class="Warriors"  id="Warriors" value="Warriors" ><label>Warriors</label><br>
<input type="checkbox" name="feature1" class="Golag"  id="Golag" value="Golag" ><label>Golag</label><br>
<input type="checkbox" name="feature1" class="Archipelo"  id="Archipelo" value="Mara" ><label>Archipelo</label><br>
<input type="checkbox" name="feature1" class="Buffalo"  id="Buffalo" value="Buffalo" ><label>Buffalo</label><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="close_button" data-dismiss="modal">Close</button>
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
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#user_id').val(id);
                    $('#userModal').modal('show');
                    $('#action').val('Update');
                    $('.modal-title').text('Update Data');
                    $('#button_action').val('update');
                }
            })
        });

        $(document).on('click', '.delete', function(e){
            var id = $(this).attr('id');
            var form = this;

     e.preventDefault();

     swal({
       title: "Are you sure?",
       text: "You will not be able to recover this imaginary file!",
       icon: "warning",
       buttons: [
         'No, cancel it!',
         'Yes, I am sure!'
       ],
       dangerMode: true,
     }).then(function(isConfirm) {
       if (isConfirm) {
         swal({
           title: 'Deleted!',
           text: 'User is successfully deleted!',
           icon: 'success'
         }).then(function() {
          //
          $.ajax({
              url:"{{route('welcome.removedata')}}",
              method:"get",
              data:{id:id},
              success:function(data)
              {
//toastr.success('User Already Deleted', 'User Deleted')
              //  alert(data);
                $('#user_table').DataTable().ajax.reload();
              }
          })
         });
       } else {
         swal("Cancelled", "The user has not been deleted :)", "error");
       }
     });
});

      $(document).on('click', '.view', function(){
              var id = $(this).attr("id");
              $.ajax({
                  url:"{{route('welcome.viewclubs')}}",
                  method:'get',
                  data:{id:id},
                  dataType:'json',
                  success:function(data)
                  {
                $('#user_name').val(data.user_name);
                $('#club_name').val(data.club_name);
                $('#action').val("view");
                $('#view').modal('show');
                $('.modal-title').text('View Clubs');
                $('#button_action').val('view');
                $("#view").find('.modal-body').text(data.data[0].clubs);
//$(".modal-body").text(data.data[0].clubs);
}})});

$('#user_table').on( 'open.dt', function () {
toastr.info('Users are being Processsed', 'Please Wait')
} );

//addint script for enroll
$(document).on('click', '.enroll', function(){
$('.Mara').prop('checked', false);
$('.Maasai').prop('checked', false);
$('.Mamba').prop('checked', false);
$('.Samburu').prop('checked', false);
$('.Olive').prop('checked', false);
$('.Razors').prop('checked', false);
$('.Warriors').prop('checked', false);
$('.Golag').prop('checked', false);
$('.Archipelo').prop('checked', false);
$('.Buffalo').prop('checked', false);

  var id = $(this).attr("id");
        // $('#form_output').html('');
         $.ajax({
             url:"{{route('welcome.enrollData')}}",
             method:'get',
             data:{id:id},
             dataType:'json',
             success:function(data)
             {
               $('#enroll_user_id').val(data.enroll_user_id);
                //     $('#enroll_club_id').val(data.enroll_club_id);
                //     $('#user_id').val(id);
                     $('#enroll').modal('show');
                     $('#action').val('Enroll');
                     $('.modal-title').text('Enroll User');
                     //add method for taking in the club
      }
    })  });

$(document).on('click', '.Mara', function(){
        //$('.Mara').prop('checked', false);
        toastr.info('User Added to Club', 'User Addition Succesfull');
        var id = $(this).attr("id");
        var userId = $('#enroll_user_id').val();
      //  $('#form_output').html('');
        $.ajax({
            url:'{{ url('enroll-user') }}/'+userId,
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
              $('#enroll').modal('show');
                $('#action').val('Mara');
                $('#Mara').val('Mara');
            }})});

      $(document).on('click', '.Maasai', function(){
        toastr.info('User Added to Maasai Club', 'User Addition Succesfull');
        var id = $(this).attr("id");
        var userId = $('#enroll_user_id').val();
        //    $('#form_output').html('');
        $.ajax({
          url:'{{ url('enroll-user') }}/'+userId,
          method:'get',
          data:{id:id},
          dataType:'json',
          success:function(data)
          {   $('#enroll').modal('show');
          $('#action').val('Maasai');
          $('#Maasai').val('Maasai');
        }})});


        $(document).on('click', '.Mamba', function(){
          toastr.info('User Added to Mamba Club', 'User Addition Succesfull');
          var id = $(this).attr("id");
          var userId = $('#enroll_user_id').val();
          //    $('#form_output').html('');
          $.ajax({
            url:'{{ url('enroll-user') }}/'+userId,
            method:'get',
            data:{id:id},
            dataType:'json',
            success:function(data)
            {   $('#enroll').modal('show');
            $('#action').val('Mamba');
            $('#Mamba').val('Mamba');
          }})});

          $(document).on('click', '.Samburu', function(){
            toastr.info('User Added to Samburu Club', 'User Addition Succesfull');
            var id = $(this).attr("id");
            var userId = $('#enroll_user_id').val();
            $('#form_output').html('');
            $.ajax({
              url:'{{ url('enroll-user') }}/'+userId,
              method:'get',
              data:{id:id},
              dataType:'json',
              success:function(data)
              {   $('#enroll').modal('show');
              $('#action').val('Samburu');
              $('#Samburu').val('Samburu');
            }})});

            $(document).on('click', '.Olive', function(){
              toastr.info('User Added to Olive Club', 'User Addition Succesfull');
              var id = $(this).attr("id");
              var userId = $('#enroll_user_id').val();
              $('#form_output').html('');
              $.ajax({
                url:'{{ url('enroll-user') }}/'+userId,
                method:'get',
                data:{id:id},
                dataType:'json',
                success:function(data)
                {   $('#enroll').modal('show');
                $('#action').val('Olive');
                $('#Olive').val('Olive');
              }})});

              $(document).on('click', '.Razors', function(){
                toastr.info('User Added to Razors Club', 'User Addition Succesfull');
                var id = $(this).attr("id");
                var userId = $('#enroll_user_id').val();
                $('#form_output').html('');
                $.ajax({
                  url:'{{ url('enroll-user') }}/'+userId,
                  method:'get',
                  data:{id:id},
                  dataType:'json',
                  success:function(data)
                  {   $('#enroll').modal('show');
                  $('#action').val('Razors');
                  $('#Razors').val('Razors');
                }})});

                $(document).on('click', '.Warriors', function(){
                  toastr.info('User Added to Warriors Club', 'User Addition Succesfull');
                  var id = $(this).attr("id");
                  var userId = $('#enroll_user_id').val();
                  $('#form_output').html('');
                  $.ajax({
                    url:'{{ url('enroll-user') }}/'+userId,
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {   $('#enroll').modal('show');
                    $('#action').val('Warriors');
                    $('#Warriors').val('Warriors');
                  }})});

                  $(document).on('click', '.Golag', function(){
                    toastr.info('User Added to Golag Club', 'User Addition Succesfull');
                    var id = $(this).attr("id");
                    var userId = $('#enroll_user_id').val();
                    $('#form_output').html('');
                    $.ajax({
                      url:'{{ url('enroll-user') }}/'+userId,
                      method:'get',
                      data:{id:id},
                      dataType:'json',
                      success:function(data)
                      {   $('#enroll').modal('show');
                      $('#action').val('Golag');
                      $('#Golag').val('Golag');
                    }})});

                    $(document).on('click', '.Archipelo', function(){
                      toastr.info('User Added to Archipelo Club', 'User Addition Succesfull');
                      var id = $(this).attr("id");
                      var userId = $('#enroll_user_id').val();
                      $('#form_output').html('');
                      $.ajax({
                        url:'{{ url('enroll-user') }}/'+userId,
                        method:'get',
                        data:{id:id},
                        dataType:'json',
                        success:function(data)
                        {   $('#enroll').modal('show');
                        $('#action').val('Archipelo');
                        $('#Archipelo').val('Archipelo');
                      }})});

                      $(document).on('click', '.Buffalo', function(){
                        toastr.info('User Added to Buffalo Club', 'User Addition Succesfull');
                        var id = $(this).attr("id");
                        var userId = $('#enroll_user_id').val();
                        $('#form_output').html('');
                        $.ajax({
                          url:'{{ url('enroll-user') }}/'+userId,
                          method:'get',
                          data:{id:id},
                          dataType:'json',
                          success:function(data)
                          {   $('#enroll').modal('show');
                          $('#action').val('Buffalo');
                          $('#Buffalo').val('Buffalo');
                        }})});


} );
    </script>
    </body>
    </html>
