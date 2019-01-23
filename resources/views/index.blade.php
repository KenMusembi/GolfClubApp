<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel DataTables Editor</title>
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
      <body>
    <div class="container">
<br>
<button type="button" name="view" value="view" id="<?php 'id' ?>" class="btn btn-info" data-toggle="modal"  data-target="#TestModal">View Clubs</button><br>
<br>
        {{$dataTable->table(['id' => 'users'])}}

    </div>
<!--modal for view clubs -->

<div class="modal fade" id="TestModal" tabindex="-1" role="dialog" aria-labelledby="my_modalLabel">
<div class="modal-dialog" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
		 <h4 class="modal-title" id="TestModal"><?php 'id' ?></h4>
            <button  type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>
        <div class="modal-body">
<?php
/*
$mysqli = new mysqli("localhost", "root", "", "golfclub2");
//try to view members on database
 $result = mysqli_query($mysqli,"SELECT * FROM users u LEFT JOIN clubs_registrations c ON c.user_id = u.id  LEFT JOIN clubs s ON s.id =c.club_id WHERE club_name != '' GROUP BY s.club_name ");

 echo "<table><tr><th>";
    while($row = mysqli_fetch_array($result))
      {
      echo "<tr><td>" . $row["name"]. "</td> <td>" . " &nbsp " . $row["club_name"]. "</td></tr>";
            //echo "<pre>"; print_r($row); echo "</pre>";
    }
	echo "</table>";


    mysqli_close($mysqli);//Close the table in HTML

*/
?>{{$dataTable->table(['id' => 'users'])}}
        </div>
        <div class="modal-footer">
            <button type="button" id="dot" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<!--
want to view users -->

    <script>


        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });

            var editor = new $.fn.dataTable.Editor({
                ajax: "users",
                table: "#users",
                display: "bootstrap",

                fields: [
                    {label: "Name:", name: "name"},
                    {label: "Email:", name: "email"},
                    {label: "Password:", name: "password", type: "password"}
                ]
            });

            $('#users').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this);
            });
toastr.info('Welcome to the Site.', 'Hi!');

editor.on( 'open', function ( e, type ) {
    // Type is 'main', 'bubble' or 'inline'
    toastr.warning('You are about to edit a user, Changes made will be permamnent!', 'Warning')
} );

editor.on( 'processing', function ( e, type ) {
    // Type is 'main', 'bubble' or 'inline'
    toastr.info('Users are being Processsed', 'Please Wait')
} );

editor.on( 'remove', function ( e, type ) {
    // Type is 'main', 'bubble' or 'inline'
    toastr.success('User Deleted Succesfully!', 'Success')
} );

editor.on( 'create', function ( e, type ) {
    // Type is 'main', 'bubble' or 'inline'
    toastr.success('User Created Succesfully', 'Success!')
} );

            {{$dataTable->generateScripts()}}

        })


    </script>
</body>
</html>
