<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

<div class="form-body">
                <form class="form-horizontal" method="POST" action="{{ route('product.order') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-sm-7">
                            <select id="inputState" class="form-control" name="product">
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="quantity" class="form-control" id="name" placeholder="QTY" required>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit"><strong>+</strong>Add To Cart</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="well">
                <div class="w3l-table-info">
                    <table id="customer" class="table">
                        <thead>
                        <tr>
                            {{--<th class="text-center">ID</th>--}}
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Generic Name</th>
                            <th class="text-center"><p>Category/ description</p></th>
                            <th class="text-center"> Price</th>
                            <th class="text-center">QTY </th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Profit</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\Cart::content() as $sale)
                            <tr>
                                <td class="text-center"><strong>{!! $sale->name !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->options->generic_name !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->options->category !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->price !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->qty !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->subtotal !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->options->profit !!}</strong></td>
                                <td class="text-center">
                                    <a class="btn btn-danger" href="{{ route('product.remove',$sale->rowId) }}">Cancel</a>
                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-5">
                            <h3>Total ammount : {{ \Cart::subtotal() }}</h3>
                        </div>
                    </div>
                </div>
                <br>
              <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal_product">Save</button>
               <!-- begin:modal Add product -->
                <div id="myModal_product" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content" >
                            <center>
                                <div class="modal-header">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <h3 class="modal-title">Cash</h3>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <div class="modal-body" >
                                <form class="form-horizontal" method="POST" action="/Point-Of-Sale-master/public/payment">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Customer Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Customer Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Cash Amount</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="cash" class="form-control" id="name" placeholder="100" required>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary" type="submit" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>


