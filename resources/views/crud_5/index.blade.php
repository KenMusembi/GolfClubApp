<div class="container">
    <div class="float-right">
        <a href="#modalForm" data-toggle="modal" data-href="{{url('laravel-crud-search-sort-ajax-modal-form/create')}}"
           class="btn btn-primary">New</a>
    </div>
    <h1 style="font-size: 1.3rem">Golf Club</h1>
    <hr/>
    <div class="row">
        <div class="col-sm-4 form-group">
            {!! Form::select('gender',['-1'=>'Select Gender','Male'=>'Male','Female'=>'Female'],request()->session()->get('gender'),['class'=>'form-control','onChange'=>'ajaxLoad("'.url("laravel-crud-search-sort-ajax-modal-form").'?gender="+this.value)']) !!}
        </div>
        <div class="col-sm-5 form-group">
            <div class="input-group">
                <input class="form-control" id="search"
                       value="{{ request()->session()->get('search') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('laravel-crud-search-sort-ajax-modal-form')}}?search='+this.value)"
                       placeholder="Search name" name="search"
                       type="text" id="search"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-warning"
                            onclick="ajaxLoad('{{url('laravel-crud-search-sort-ajax-modal-form')}}?search='+$('#search').val())"
                    >
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered bg-light">
        <thead class="bg-primary" style="color: white">
        <tr>
            <th width="60px" style="vertical-align: middle;text-align: center">No</th>
            <th width="210px" style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('laravel-crud-search-sort-ajax-modal-form?field=name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Name
                </a>
                {{request()->session()->get('field')=='name'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th width="180px" style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('laravel-crud-search-sort-ajax-modal-form?field=gender&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Gender
                </a>
                {{request()->session()->get('field')=='gender'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th width="300px" style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('laravel-crud-search-sort-ajax-modal-form?field=email&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Email
                </a>
                {{request()->session()->get('field')=='email'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('laravel-crud-search-sort-ajax-modal-form?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Club
                </a>
                {{request()->session()->get('field')=='created_at'?(request()->session()->get('sort')=='asc'?'&#9652;':''):''}}
            </th>

            <th width="200px" style="vertical-align: middle">Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach($members as $member)
            <tr>
                <th style="vertical-align: middle;text-align: center">{{$i++}}</th>
                <td style="vertical-align: middle">{{ $member->name }}</td>
                <td style="vertical-align: middle">{{ $member->gender }}</td>
                <td style="vertical-align: middle">{{$member->email}}</td>

                <td style="vertical-align: middle">
                  <a class="btn btn-outline-success btn-sm" data-toggle="modal"
                  data-id="{{ $member->club_name }}"
    data-title="{{ $member->name }}"
    data-target="#TestModal">
                      View Clubs</a>
                    </td>

                <td style="vertical-align: left" align="center">
                    <a class="btn btn-primary btn-sm" title="Edit" href="#modalForm" data-toggle="modal"
                       data-href="{{url('laravel-crud-search-sort-ajax-modal-form/update/'.$member->id)}}">
                        Edit</a>
                    <input type="hidden" name="_method" value="delete"/>

                    <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="{{$member->id}}"
                       data-token="{{csrf_token()}}">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-end">
            {{$members->links('vendor.pagination.bootstrap-4')}}
        </ul>
    </nav>
</div>

@foreach ($members as $member):
<div class="modal fade" id="TestModal" tabindex="-1" role="dialog" aria-labelledby="my_modalLabel">
<div class="modal-dialog" role="dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="TestModal">{{$member->name}}</h4>
        </div>
        <div class="modal-body">
            {{$member->club_name}},
            
            <input type="hidden" name="hiddenValue" id="hiddenValue" value="" />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary">Yes</button>
        </div>
    </div>
</div>
  @endforeach
