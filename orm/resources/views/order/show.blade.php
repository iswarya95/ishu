@extends('layouts.adminapp')

@section('title')
	Print Order
@endsection

@section('body')

<section class="vbox bg-white">
    <header class="header b-b b-light hidden-print">
        <button href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Print</button>
        <p>Invoice</p>
    </header>
    <section class="scrollable wrapper" id="print">
        <div class="row">
            <div class="col-xs-6">
                <h2 style="margin-top: 0px">CITW <b></b></h2>
                <p>No 86,Block 1,2nd Floor,<br>
                    4th Main Road,CBI Colony,<br>
                    Kanthanchavadi,
                    Chennai-600 096.
                </p>
            </div>
            <div class="col-xs-6 text-right">
                <h4>INVOICE</h4>
            </div>
        </div>
        <div class="well m-t" style="margin-bottom: 50px">
            <div class="row">
                <div class="col-xs-6">
                    <strong>TO:</strong>
                    <h4>{{ $order->name }}</h4>
                    <p>
                        {{ $order->address }}
                    </p>
                    <b>Phone: </b>{{ $order->phone }}
                </div>
                <div class="col-xs-6 text-right">
                    <p class="h4">#{{ $order->id }}</p>
                    <h5>Delevery date: <strong>{{ $order->delivery_date }}</strong></h5>
                    <!-- <h5>Order date: <strong>26th Mar 2013</strong><h5> -->
                    <p class="m-t m-b">Order ID: <strong>#4</strong></p>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <table class="table">
            <thead>
            <tr>
                <th width="60">QTY</th>
                <th>DESCRIPTION</th>
                <th width="120">RATE</th>
                <th width="120">AMOUNT</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $order->quantity }}</td>
                <td><b>{{ $order->product->id }}. {{ $order->product->product_name }}</b><br><small>{{ $order->product->product_details }}</small></td>
                <td class=""> {{ $order->product->price }}</td>
                <td class=""> {{ $order->product->price * $order->quantity }}</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
                <td>{{ $order->product->price * $order->quantity }}</td>
            </tr>
          <!--   <tr>
              <td colspan="3" class="text-right no-border"><strong>VAT</strong></td>
              <td>Tk 0.00</td>
          </tr> -->
            <tr>
                <td colspan="3" class="text-right no-border"><strong>Total</strong></td>
                <td><strong> {{ $order->product->price * $order->quantity }}</strong></td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-xs-8">
                <p style="text-align: justify;"><i> Sailing away from safe harbour to paradise</i></p><br><br>

                <p>Recvied By: __________________ </p>
            </div>
        </div>
    </section>
</section>

@endsection