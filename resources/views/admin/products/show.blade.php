<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Transfer</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
  <div class="container">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Transfer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ Url('manageProducts') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {{ $product->quantity }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <form method="post" action="{{route('transfer')}}">
                    @csrf
                <div class="form-group">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                </div>
                <div class="form-group">
                    <input type="number" name="quantity" placeholder="quantity">
                </div>
                <div class="form-group">
                        <select  id="categories" name="store"  multiple required>
                            @foreach($categories as $category)
                            <option value ="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                          <div class="form-group">
                            <button>Transfer</button>
                          </div>
				</div> 

                </form>
            </div>
        </div>

    </div>
    </div>
</body>
</html>