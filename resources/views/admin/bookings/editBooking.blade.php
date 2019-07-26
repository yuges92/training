@extends('layouts.adminLayout')

@section('content')
<div class="container p-0 ">
    <h2 class="">Order #{{$order->id}}</h2>

    <section class="invoice printableArea m-0">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h2 class="page-header">
                    Order Details
                    <small class="pull-right">Order Date: {{$order->created_at}}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">

                <strong class="text-blue">Ordered by</strong><br>

                <address>
                    <strong class="">{{$order->user ? $order->user->getFullname():''}}</strong><br>
                    {{$order->user ? $order->user->getAddressByType('home')->line1 : ''}}<br>
                    {{$order->user ? $order->user->getAddressByType('home')->town : ''}}<br>
                    {{$order->user ? $order->user->getAddressByType('home')->county : ''}}<br>
                    {{$order->user ? $order->user->getAddressByType('home')->postcode : ''}}<br>
                    {{$order->user ? $order->user->getAddressByType('home')->country : ''}}<br>
                    Phone: {{$order->user ? $order->user->phone : ''}}<br>
                    Email: {{$order->user ? $order->user->email : ''}}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-6 invoice-col text-lg-right">
                <address>
                    <strong class="text-blue">Billing Details</strong><br>
                    {{$order->billingFirstName.' '.$order->billingLastName}}<br>
                    {{$order->billingLine1}}<br>
                    {{$order->billingTown}}<br>
                    {{$order->billingCounty}}<br>
                    {{$order->billingPostcode}}<br>
                    {{$order->billingCountry}}<br>
                    Phone: {{$order->billingTel}}<br>
                    Email: {{$order->billingEmail}}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-12 invoice-col">
                <div class="invoice-details row no-margin">
                    <div class="col-md-6 col-lg-2"><b>Order ID:</b> {{$order->id}}</div>
                    <div class="col-md-6 col-lg-3"><b>Ordered: </b>{{$order->type()}}</div>
                    <div class="col-md-6 col-lg-3"><b>Order Status:</b> {{$order->status}}</div>
                    <div class="col-md-6 col-lg-4"><b>Referral Code:</b> {{$order->referralCode}}</div>
                </div>
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Price<small>(ex VAT)</small></th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Subtotal<small>(ex VAT)</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $detail)
                        <tr>
                            <td>{{$detail->class->id}}</td>
                            <td>{{$detail->class->title}}</td>
                            <td>£{{$detail->price}}</td>
                            <td class="text-right">{{$detail->quantity}}</td>
                            <td class="text-right">£{{$detail->getItemSubTotal()}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-12 col-sm-6">
                <p class="lead"><b>Payment Methods: <small>{{ucfirst($order->paymentMethod)}}</small></b></p>
                <div class="">
                    <b>Purchase order number:</b>{{$order->poNumber}}
                </div>

                <div class="">
                    <b>Payment Status:</b>{{$order->poNumber}}

                </div>
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 text-right">
                <div>
                    <p>Sub Total <small>(ex VAT)</small>: £{{$order->subTotal}}</p>
                    <p>Tax <small>({{$order->vat*100}}%)</small> : £{{$order->totalVat}}</p>
                </div>
                <div class="total-payment">
                    <h3><b>Total :</b> £{{$order->total}}</h3>
                </div>

            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->

        <form class="" action="{{route('order.update', $order->id)}}" method="post">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="status" class=" col-form-label sr-only">Order Status</label>
                <div class="col-md-6 ">
                    <select id="status" class="form-control" name="status">
                        <option value="completed" {{($order->status=='completed')? 'selected':''}}>Completed</option>
                        <option value="failed" {{($order->status=='failed')? 'selected':''}}>Failed</option>
                        <option value="cancelled" {{($order->status=='cancelled')? 'selected':''}}>Cancelled</option>
                        <option value="refunded" {{($order->status=='refunded')? 'selected':''}}>Refunded</option>
                        <option value="pending" {{($order->status=='pending')? 'selected':''}}>Pending</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="notifyUser" name="notifyUser" value="1">
                    <label class="form-check-label" for="notifyUser">
                        Notify buyer about the change
                    </label>
                </div>
            </div>
            <div class=" d-flex justify-content-end">
                <button class="btn btn-info" type="submit" name="button">Update</button>
            </div>
        </form>
    </section>
</div>
@endsection
