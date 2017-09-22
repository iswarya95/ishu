@extends('layouts.adminapp')

@section('title')
    All Product
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
       <!--  <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul> -->
        <div class="m-b-md">
            <h3 class="m-b-none">Product Data</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                All Product Data
                <button onClick ="$('#table').tableExport({type:'pdf',escape:'false',pdfFontSize:12,separator: ','});" class="btn btn-default btn-xs pull-right">PDF</i></button>
               
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
               
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="100px">ID</th>
                            <th width="">Product Name</th>
                            <th width="50%">Product Details</th>
                            <th width="">Product Price</th>
                            <th width="70px">Buttons</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product )
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_details }}</td>
                                <td>{{ $product->price }}</td>
                               
                                 <td>
                                   
                                      <a href="{{ url('admin/product/delete',$product->id) }}" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>
                                    <a href="{{ url('admin/product/edit',$product->id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-edit"></i></a>
                                
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