<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <style>
     
    /* Styles for the invoice */
    body {
      font-family: Arial, sans-serif;
    }
    .invoice {
      margin: 0 auto;
      width: 700px;
    }
    .invoice-header {
      background-color: #f5f5f5;
      padding: 20px;
    }
    .invoice-header h1 {
      margin: 0;
    }
    .invoice-details {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .invoice-details div {
      margin-right: 20px;
    }
    .invoice-details span {
      font-weight: bold;
    }
    .invoice-table {
      border-collapse: collapse;
      margin-top: 20px;
      width: 100%;
    }
    .invoice-table th,
    .invoice-table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    .invoice-table th {
      background-color: #f5f5f5;
      font-weight: bold;
    }
    .invoice-total {
      margin-top: 20px;
      text-align: right;
    }
  </style>
</head>
<body>
  <div class="invoice">
    <div class="invoice-header">
      <h1>Invoice</h1>
    </div>
    <div class="invoice-details">
      <div>
        <span>Invoice #:</span> {{$order->id}}<br>
        <span>Date:</span> {{$order->created_at}}
      </div>
      <div>
        <span>From:</span> <h3 style="color:rgb(172, 239, 58);">Ecom</h3>
        <span>To:</span>{{$order->name}}<br>
        <span>Email:</span> {{$order->email}}<br>
        <span>Mobile:</span> {{$order->contact}}
      </div>
    </div>
    <table class="invoice-table">
      <thead>
        <tr>
          <th>Description</th>
          <th>product_image</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Payment Method</th>
        </tr>
      </thead>
      <tbody>
       
        <tr>
          <td>{{$order->product_name}}</td>
          <td><img src="image/{{$order->image}}" width="50" height="50"></td>
          <td>{{$order->quantity}}</td>
          <td>{{$order->price}}</td>
          <td>{{$order->payment_status}}</td>
          
        </tr>
       
      </tbody>
    </table>
    <div class="invoice-total">
      <span></span>
    </div>
  </div>
</body>
</html>
