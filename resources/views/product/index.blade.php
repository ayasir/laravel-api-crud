

<div class="main-grid">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

    <div class="agile-grids">
        <!-- blank-page -->
        <div class="table-heading">
            <h2>{{--{!! $user->name !!}'s--}} Point Of Sale Products</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <p>Total Number of Products : <strong>{{$num}}</strong></p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal_product">+Add Product</a>
            </div>
        </div>
        <!-- begin:modal Add product -->
        <div id="myModal_product" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <center>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Add Product</h3><br>
                        </div>
                    </center>
                    <div class="modal-body" >
                    <form class="form-horizontal" method="get" action="product">
{!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="brand_name" class="form-control" id="name" placeholder="Enter Brand Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Generic Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="generic_name" class="form-control" id="name" placeholder="Enter Generic Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="category" class="form-control" id="name" placeholder="Category Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Arrival Date</label>
                                    <div class="col-sm-9">
                                        <input id="date" type="date" class="form-control" name="receive_date" placeholder="2017-06-01" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Exp Date</label>
                                    <div class="col-sm-9">
                                        <input id="date" type="date" class="form-control" name="exp_date" placeholder="2017-06-01" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Orginal Price</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="orginal_price" class="form-control" id="name" placeholder="100" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Selling Price</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="sell_price" class="form-control" id="name" placeholder="100" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="quantity" class="form-control" id="name" placeholder="100" required>
                                    </div>
                                </div>
                                <br>
                                <input type="submit" value="Submit">
                            </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-hover btn-primary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- End:modal Add Product -->
        <hr>
        <div class="well">
            <div class="w3l-table-info">
                <table id="customer" class="table">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Brand Name</th>
                        <th class="text-center">Generic Name</th>
                        <th class="text-center"><p>Category/ description</p></th>
                        <th class="text-center">Date Received</th>
                        <th class="text-center">Expiry Date</th>
                        <th class="text-center">Orginal price</th>
                        <th class="text-center">Selling Price</th>
                        <th class="text-center">QTY</th>
                        <th class="text-center">QTY Left</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center"><strong>{!! $product->id !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->brand_name !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->generic_name !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->category !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->receive_date !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->exp_date !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->orginal_price !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->sell_price !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->quantity !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->quantity_left !!}</strong></td>
                            <td class="text-center"><strong>{!! $product->total !!}</strong></td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-success" href="{!! route('product.update',$product->id) !!}">Update</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete_product">Delete</a>
                                    </div>
                                </div>
                            </td>
                            <!-- begin:modal Add product -->
                            <div id="delete_product" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                        <center>
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h3 class="modal-title">Delete Product Confirmation</h3><br>
                                            </div>
                                        </center>
                                        <div class="modal-body" >
                                            <p>
                                                Are you sure want to Detete this product?
                                            </p>
                                            <form class="form-horizontal" method="get" action="/product/delete/{{$product->id}}">
                                                {{csrf_field()}}
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <button type="button" class="btn btn-hover btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input class="btn btn btn-hover btn-danger btn-sm" type="submit" value="Yes, Delete">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End:modal Add Product -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



