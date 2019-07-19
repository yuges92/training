@extends('layouts.adminLayout')

@section('content')
  <div class="container p-0 ">
    <h2 class="">Order #{{$order->id}}</h2>
    {{-- <div class="row">

      <div class="col-md-8">

        <div class="order-summary">

          <div class="card">
            <div class="card-header">
              <h2 >Order Summary</h2>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-md-6">
                  <strong class="">Order ID:</strong>
                  <span>{{$order->id}}</span>
                </div>
                <div class="col-md-6">
                  <strong>Order Status:</strong>
                  <span>{{$order->status}}</span>
                </div>
                <div class="col-md-6">
                  <strong>Order Date:</strong>
                  <span>{{$order->created_at}}</span>
                </div>
                <div class="col-md-6">
                  <strong>Ordered by:</strong>
                  <span>{{$order->user->getFullname()}}</span>
                </div>
                <div class="col-md-6">
                  <strong>Payment Method:</strong>
                  <span>{{$order->paymentMethod}}</span>
                </div>
                <div class="col-md-6">
                  <strong>Total:</strong>
                  <span>£{{$order->total}}</span>
                </div>

                <div class="col-md-6">
                  <strong>Purchase Order Number:</strong>
                  <span>{{$order->poNumber}}</span>
                </div>

                <div class="col-md-6">
                  <strong>Referral Code:</strong>
                  <span>{{$order->referralCode}}</span>
                </div>
                <div class="col-md-6">
                  <strong>Order Type:</strong>
                  <span>{{$order->type()}}</span>
                </div>

                <div class="col-md-6">
                  <strong>Payment Status:</strong>
                  <span>{{$order->payment->payment_status}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="orderDetails mt-3">
          <div class="card">
            <div class="card-body">
              <h2>Order Details</h2>
              <div class="order">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Price <small>(ex VAT)</small></th>
                        <th>Quantity</th>
                        <th>Total <small>(ex VAT)</small></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($order->orderDetails as $detail)
                        <tr >
                          <td>{{$detail->class->id}}</td>
                          <td>{{$detail->class->title}}</td>
                          <td>£{{$detail->price}}</td>
                          <td>{{$detail->quantity}}</td>
                          <td>£{{$detail->getItemSubTotal()}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <div class="">
                  <div class="col-12">
                    <span class="total">Sub Total</span> <span>£{{$order->subTotal}} <small>ex VAT</small></span>

                  </div>
                  <div class="col-12">
                    <span class="total">VAT</span> <span>£{{$order->totalVat}}</span>

                  </div>
                  <div class="col-12">

                    <span class="total">Total</span> <span>£{{$order->total}} <small>inc VAT</small></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="billingDetail">
          <div class="card">
            <div class="card-header">
              <h2>Billing Details</h2>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-md-6">
                  <span>{{$order->billingFirstName.' '.$order->billingLastName}}</span>
                </div>

                <div class="col-12">
                  <span>{{$order->billingTel}}</span>
                </div>

                <div class="col-12">
                  <span>{{$order->billingLine1}}</span>
                </div>

                <div class="col-12">
                  <span>{{$order->billingLine2}}</span>
                </div>

                <div class="col-12">
                  <span>{{$order->billingTown}}</span>
                </div>

                <div class="col-12">
                  <span>{{$order->billingCounty}}</span>
                </div>

                <div class="col-12">
                  <span>{{$order->billingPostcode}}</span>
                </div>

                <div class="col-12">
                  <span>{{$order->billingCountry}}</span>
                </div>

              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3>Order Actions</h3>
          </div>
          <div class="card-body">

            <form class="" action="{{route('order.update', $order->id)}}" method="post">
              {{ csrf_field() }}
              @method('PUT')

              <div class="form-group row">
                <label for="status" class=" col-form-label sr-only">Password</label>
                <div class="col">
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
          </div>
        </div>
      </div>
    </div> --}}

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
            Email: conatct@example.com
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
              <p>Sub Total  <small>(ex VAT)</small>:  £{{$order->subTotal}}</p>
              <p>Tax <small>({{$order->vat*100}}%)</small>  :  £{{$order->totalVat}}</p>
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
