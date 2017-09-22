@extends('layouts.app')

@section('title')
    All Orders
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
     <!--    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul> -->
        <div class="m-b-md">
            <h3 class="m-b-none">Orders Data</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                All Orders Data
                <button onClick ="$('#table').tableExport({type:'pdf',escape:'false',pdfFontSize:12,separator: ','});" class="btn btn-default btn-xs pull-right">PDF</i></button>
               <!--  <button onClick ="$('#table').tableExport({type:'csv',escape:'false'});" class="btn btn-default btn-xs pull-right">CSV</button> -->
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
               
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                           
                            <th width="">Name</th>
                           
                            <th width="">Delivery Date</th>
                            <th width="">Product</th>
                            <!-- <th width="">Price</th> -->
                            <th width="">Quantity</th>
                           <!--  <th width="">Total</th> -->
                            <th width="">Payment Option</th>
                           
                            <th width="150px">Buttons</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                               
                                <td>{{ $order->name }}</td>
                              
                                <td>{{ $order->delivery_date }}</td>
                                <td>{{ $order->product->product_name }}</td>
                              <!--   <td>{{ $order->product->price }}</td> -->
                                <td>{{ $order->quantity }}</td>
                                <!-- <td>{{ $order->product->price * $order->quantity }}</td> -->
                                <td>{{ $order->payment_option }}</td>
                                
                                <td>
                                   
                                     <a href="{{ url('user/order/delete',$order->id) }}" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
                                    <a href="{{ url('user/order/edit',$order->id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('user/order/show',$order->id) }}" class="btn btn-sm btn-icon btn-success"><i class="fa fa-print"></i></a>
                                </td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
 </section>

@endsection