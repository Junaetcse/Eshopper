@extends('admin_layout')

@section('admin_content')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>

        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                <tr>
                    <th width="8%">Category Id</th>
                    <th  width="15%">Category Name</th>
                    <th width="25%">Category Description</th>
                    <th width="10%">Status</th>
                    <th width="15%">Actions</th>
                </tr>
                </thead>

@foreach($category_info as $v_category)
                <tbody>
                <tr>
                    <td>{{$v_category->id}}</td>
                    <td class="center">{{$v_category->category_name}}</td>
                    <td class="center">{{$v_category->category_description}}</td>
                    <td class="center">
                        @if($v_category->public_status==1)

                        <span class="label label-success">Active</span>

                            @else
                            <span class="label label-danger">UnActive</span>

                        @endif
                    </td>
                    <td class="center">
                        @if($v_category->public_status==1)
                        <a class="btn btn-danger" href="{{URL::to('/UnActive-category/'.$v_category->id)}}">
                            <i class="halflings-icon white thumbs-down"></i>
                        </a>
                        @else
                        <a class="btn btn-success"  href="{{URL::to('/Active-category/'.$v_category->id)}}">
                            <i class="halflings-icon white thumbs-up"></i>
                        </a>
                        @endif
                        <a class="btn btn-info" href="{{URL::to('/eCategory/'.$v_category->id)}}">
                                        <i class="halflings-icon white edit"></i>                                            
                                    </a>
                        <a class="btn btn-danger" href="{{URL::to('/delete-Category/'.$v_category->id)}}">
                            <i class="halflings-icon white trash"></i>
                        </a>
                    </td>
                </tr>
                </tbody>

    @endforeach
            </table>

        </div>
    </div>








@endsection()