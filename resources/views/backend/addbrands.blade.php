@extends('admin_layout')
@section('admin_content')

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brands</h2>
            </div>


            <p class="alert-success">
<!--                --><?php
//                $message=Session::get('message');
//                if ($message){
//                    echo 'Category added successfully ';
//                    Session::put('message',null);
//                }
//
//                ?>
            </p>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="{{url('save-brand')}}">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label"  for="typeahead">Brand Name </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="brand_name"/>
                            </div>
                        </div>


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Brand Description </label>
                            <div class="controls">
                                <textarea class="cleditor" name="brand_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publication status </label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1" />
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Brands</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!--/span-->


@endsection()

