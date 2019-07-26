@component('mail::message')
Dear {{$user->firstName}} {{$user->lastName}},
<p>
    Thank you for purchasing our course(s).
</p>

<p>
    Your order is currently with the training department to be confirmed. Once this is completed, you will receive an
    email with further instructions.
</p>

<p>
    You can access the portal at any time here <a href="{{route('login')}}" target="_blank"> {{route('login')}}</a>.
</p>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th class="text-right">Quantity</th>
            <th class="text-right">Subtotal<small>(ex VAT)</small></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->orderDetails as $detail)
        <tr>
            <td>{{$detail->class->title}}</td>
            <td class="text-right">{{$detail->getQuantity()}}</td>
            <td class="text-right">£{{$detail->getItemSubTotal()}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

<div class="row">

    <!-- /.col -->
    <div class="col-12 col-sm-6 text-right">
        <div>
            <p>Sub Total <small>(ex VAT)</small>: £{{$order->subTotal}}</p>
            <p>Tax <small>({{$order->vat*100}}%)</small> : £{{$order->totalVat}}</p>
        </div>
        <div class="total-payment">
            <h1><b>Total :</b> £{{$order->total}}</h1>
        </div>

    </div>

    <!-- accepted payments column -->
    <div class="col-12 col-sm-6">
        <p class="lead"><b>Payment Methods: <small>{{ucfirst($order->paymentMethod)}}</small></b></p>
        <div class="">
            <b>Purchase order number:</b> {{$order->poNumber}}
        </div>

        <div class="">
            <b>Payment Status:</b> {{$order->status}}

        </div>
    </div>
</div>

<br>
<p>
    If you have any difficulties or questions in the meantime, please contact the training department on 020 7432 8010
    or <a href="mailto:training@dlf.org.uk">training@dlf.org.uk</a>.
</p>


<p>
    Kind regards,<br>
    DLF Training
</p>

@endcomponent
