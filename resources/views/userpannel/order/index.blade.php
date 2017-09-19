@extends('layouts.app')

@section('title')
    All Orders
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Orders Data</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                All Orders Data
                <button onClick ="$('#table').tableExport({type:'pdf',escape:'false',pdfFontSize:12,separator: ','});" class="btn btn-default btn-xs pull-right">PDF</i></button>
                <button onClick ="$('#table').tableExport({type:'csv',escape:'false'});" class="btn btn-default btn-xs pull-right">CSV</button>
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                <button onClick ="$('#table').tableExport({type:'sql',escape:'false',tableName:'orders'});" class="btn btn-default btn-xs pull-right">SQL</i></button>
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="">ID</th>
                            <th width="">Name</th>
                           
                            <th width="">Delivery Date</th>
                            <th width="">Product</th>
                            <th width="">Price</th>
                            <th width="">Quantity</th>
                            <th width="">Total</th>
                            <th width="">Payment Option</th>
                           
                            <th width="150px">Buttons</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                            <tr>
                                <td>{{ $orders->id }}</td>
                                <td>{{ $orders->name }}</td>
                              
                                <td>{{ $orders->delivery_date }}</td>
                                <td>{{ $orders->product->product_name }}</td>
                                <td>{{ $orders->product->price }}</td>
                                <td>{{ $orders->quantity }}</td>
                                <td>{{ $orders->product->price * $orders->quantity }}</td>
                                <td>{{ $orders->payment_option }}</td>
                                
                                <td>
                                    {{ Form::open(['route' => ['order.destroy', $orders->id], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Are you sure you want to delete this?')" ><i class="fa fa-trash-o"></i></button>
                                    {{ Form::close() }}
                                    <a href="{{ url('user/order/edit',$orders->id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('user/order/show',$orders->id) }}" class="btn btn-sm btn-icon btn-success"><i class="fa fa-print"></i></a>
                                </td>
                            </tr>
                       
                    </tbody>
                </table>
            </div>
        </section>
    </section>
 </section>

@endsection