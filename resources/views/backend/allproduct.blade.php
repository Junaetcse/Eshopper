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
                    <th width="5%">Product Id</th>
                    <th  width="10%">Product Name</th>
                    <th width="13%">Product Description</th>
                    <th width="20%">Product Image</th>
                    <th  width="8%">Product price</th>
                    <th width="10%">Category Name</th>
                    <th  width="10%">Manufacture Name</th>
                    <th width="10%">Status</th>
                    <th width="15%">Actions</th>
                </tr>
                </thead>

                @foreach($product_info as $v_product)
                    <tbody>
                    <tr>
                        <td>{{$v_product->product_id}}</td>
                        <td class="center">{{$v_product->product_name}}</td>
                        <td class="center">{{$v_product->product_short_description}}</td>
                        <td class="center"> <img src="{{URL::to($v_product->product_image)}}" style="width: 80px; height: 50px

"></td>
                        <td class="center">{{$v_product->product_price}}</td>
                        <td class="center">{{$v_product->category_name}}</td>
                        <td class="center">{{$v_product->manufacture_name}}</td>


                        <td class="center">
                            @if($v_product->publication_status==1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">UnActive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($v_product->publication_status==1)
                                <a class="btn btn-danger" href="{{URL::to('/UnActive-product/'.$v_product->product_id)}}">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            @else
                                <a class="btn btn-success"  href="{{URL::to('/Active-product/'.$v_product->product_id)}}">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                            @endif
                            <a class="btn btn-info" href="{{URL::to('/eCategory/'.$v_product->product_id)}}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete-product/'.$v_product->product_id)}}">
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