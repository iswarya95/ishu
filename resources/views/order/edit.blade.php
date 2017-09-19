@extends('layouts.adminapp')

@section('title')
    Edit Order
@endsection


@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Order</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                 Order
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body">
                {!! Form::model($order, array('method'=>'PATCH','route' => array('order.update', $order->id))) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            {!! Form::text('name', null, ['placeholder'=>'Enter full name', 'class'=>'form-control input-lg','required','readonly' => 'true']) !!}
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            {!! Form::text('phone', null, ['placeholder'=>'Enter phone number', 'class'=>'form-control input-lg','required','maxlength'=>"10"]) !!}
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            {!! Form::textarea('address', null, ['placeholder'=>'Enter full address', 'class'=>'form-control input-lg','rows'=>'3','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Delivery Date</label>
                            {!! Form::date('delivery_date', null, [ 'class'=>'form-control input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Product ID</label>
                            {!! Form::select('product_id', $product, null, ['id'=>'product_id', 'class'=>'form-control m-b input-lg','required']) !!}
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Select Pament Option</label>
                                    {!! Form::select('payment_option', array( 'Postpay' => 'Postpay', 'Prepay (Full)' => 'Prepay (full)', 'Prepay (Half)' => 'Prepay (Half)'), null, ['class'=>'form-control m-b input-lg','required']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    {!! Form::number('quantity', null, ['placeholder'=>'Enter quantity', 'class'=>'form-control input-lg','required']) !!}
                                </div>
                            </div>
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