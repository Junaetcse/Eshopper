@extends('admin_layout')

@section('admin_content')


    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
            </div>


            <p class="alert-success">
                <?php
                 $message=Session::get('message');
                 if ($message){
                     echo 'Category added successfully ';
                     Session::put('message',null);
                 }

                ?>
            </p>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="{{url('/edit-category',$category-edit->id )}}">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label"  for="typeahead">Category Name </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" value="{{$category_edit->category_name}}" />
                            </div>
                        </div>


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Category Description </label>
                            <div class="controls">
                                <textarea class="cleditor" name="category_description" rows="3">
                                	{{$category_edit->category_description}}

                                </textarea>
                            </div>
                        </div>
                  

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            </div>
        </div><!--/span-->



    @endsection()
