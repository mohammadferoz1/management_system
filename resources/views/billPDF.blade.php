<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align:center;
      text-transform: capitalize;
    }
    *{
      font-family: Arial, Helvetica, sans-serif;
    }
  </style>
</head>
<body>
    <table class="" width="100%"  cellpadding="10px">
        <tr>
            <th>
                Bill ID
            </th>
            <td>
                {{$bill_id}}
            </td>
            <th>
                Generation Date
            </th>
            <td>
              {{$generation_date}}
            </td>
        </tr>
        <tr>
            <th>
                Site
            </th>
            <td>
              {{$site_name}}
            </td>
            <th>
              Total Price
            </th>
            <td>
              {{$total_price}}
            </td>
        </tr>
    </table>
    <br><br><br>
    <table class="" width="100%"  cellpadding="10px">
        <thead>
          <tr>
              <th scope="col">Sr#</th>
              <th scope="col">Product Name</th>
              <th scope="col">Product Price</th>
          </tr>
        </thead>
        <tbody>
          @foreach($product_detail as $key => $product)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$product["name"]}}</td>
                <td>{{$product["price"]}}</td>
            </tr>
          @endforeach
          <tr>
            <th colspan="2">
              Total Price
            </th>
            <td>
              {{$total_price}}
            </td>
          </tr>
        </tbody>
      </table>
</body>
</html>