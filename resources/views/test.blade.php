@foreach ($members as $member)


<button type="button" onclick="myfunction( {{$member->id }})" > My Button </button>


                        <script>

                          function myfunction(e){

                            var x = e;

                             $('#edit_req_id').val(req_id);  //The id where to pass the value

                              $('#modal-block-popout').modal('show'); //The id of the modal to show
                            };

                         </script>


                      <div class="modal fade" id="modal-block-popout">
                       <div class="modal-content ">
                        <div class="block-options">
                  <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close" name="btn"> <i class="fa fa-fw fa-times"></i>close</button>
                       </div>
                        <div class="block-content">
                   <input class="form-control form-control-alt " type="text" id="edit_req_id" name="empid">

                 </div>
                  </div>
                </div>
                @endforeach
