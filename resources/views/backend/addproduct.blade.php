@extends('admin_layout')
@section('admin_content')


    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
            </div>


            <p class="alert-success">
                <?php
                 $message=Session::get('message');
                 if ($message){
                     echo 'Product added successfully ';
                     Session::put('message',null);
                 }
                ?>
            </p>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="{{url('save-product')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label"  for="typeahead">Product Name </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="product_name"/>
                            </div>
                        </div>

                        <div class="control-group">
								<label class="control-label" for="selectError">Product Category</label>
								<div class="controls">
								  <select id="selectError" name="category_id">
                                      <option>Select Category</option>
                                      <?php
                                      $all_publish_category=DB::table('tbl-category')
                                          ->where('public_status',1)->get();
                                      foreach ($all_publish_category as $v_category){
                                          ?>
                              <option value="{{$v_category->id}}"> {{$v_category->category_name}}</option>
                                      <?php }?>
								  </select>
								</div>
							  </div>


                             

<div class="control-group">
								<label class="control-label" for="selectError">Manufacture Name</label>
								<div class="controls">
								  <select id="selectError" name="manufacture_id">
                                      <option>Select Category</option>
                                      <?php
                                      $all_publish_manufacture=DB::table('tbl-manufacture')
                                          ->where('manufacture_public_status',1)->get();
                                      foreach ($all_publish_manufacture as $v_manufacture){
                                      ?>
                                      <option value="{{$v_manufacture->manufacture_id}}"> {{$v_manufacture->manufacture_name}}</option>

                                      <?php }?>
								  </select>
								</div>
							  </div>



                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product short  description </label>
                            <div class="controls">
                                <textarea  name="product_short_description" rows="5"></textarea>
                            </div>
                        </div>

 
                       <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product long  description  </label>
                            <div class="controls">
                                <textarea  name="product_long_description" rows="5"></textarea>
                            </div>
                        </div>
                       <div class="control-group">
                            <label class="control-label"  for="typeahead">Product price </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="product_price"/>
                            </div>
                        </div>



	<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" name="product_image" type="file">
							  </div>
							</div> 




<div class="control-group">
                            <label class="control-label"  for="typeahead">Product size </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="product_size"/>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label"  for="typeahead">Product color </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="product_color"/>
                            </div>
                        </div>



                        <div class="control-group">
                            <label class="control-label" for="typeahead">Publish status</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1" />
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            </div>
        </div><!--/span-->



    @endsection()

