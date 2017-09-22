@extends('layouts.adminapp')

@section('title')
    Edit Order
@endsection


@section('body')

<section class="vbox">
    <section class="scrollable padder">
        
        <div class="m-b-md">
            <h3 class="m-b-none">Order</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                 Order
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

             <div class="panel-body">
             
                {!! Form::open(array('url' => array('admin/product/update', $product->id))) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Product Name</label>
                            {!! Form::text('product_name', $product->product_name, ['placeholder'=>'Enter product name', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            {!! Form::number('price', $product->price, ['placeholder'=>'Enter product price', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Product Details</label>
                            {!! Form::textarea('product_details',$product->product_details, ['placeholder'=>'Enter product details', 'class'=>'form-control input-lg','rows'=>'3','required']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="line line-dashed line-lg pull-in"></div>
                        {!! Form::submit('Submit', [ 'class'=>'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}
            </div>

        </section>
    </section>
</section>

@endsection