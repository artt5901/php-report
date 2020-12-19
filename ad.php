<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
</head>

<body>


  <table id="myTable" class="table" data-toggle="table" data-mobile-responsive="true" data-pagination="true" data-height="460">

    <thead>
      <tr>
        <th>Product</th>
        <th>QTY</th>
        <th>Price</th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <select id="ex1" required>
            <option value="">Iphone</option>
            <option value="">IPod</option>
            <option value="">Galaxy Tab</option>
            <option value="">PocoPhone</option>
          </select>
        </td>
        <td>
          <input id="ex2" type="number">
        </td>
        <td>
          <input id="ex3" type="number">
        </td>
        <td>
          <input id="ex4" type="number">
        </td>
        <td>
          <button class="btn btn-outline-success" id="addrow" class="addnew"> Add </button>
        </td>
      </tr>
    </tbody>
  </table>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>

  <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>

  <!-- Unrelated: version incompatibility
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
   -->

  <script>
    $(document).ready(function() {
      //Try to get tbody first with jquery children. works faster!

      var tbody = $('#myTable').children('tbody');

      //Then if no tbody just select your table 
      var table = tbody.length ? tbody : $('#myTable');

      $('#addrow').click(function() {
        //Add row

        table.append('<tr><td >  <select  id="ex1"  required >   <option value="">Iphone</option><option value="">IPod</option><option value="">Galaxy Tab</option> <option value="">PocoPhone</option> </select>  </td>  <td >  <input  id="ex2" type="number">  </td> <td ><input  id="ex3" type="number"> </td> <td > <input  id="ex4" type="number"> </td> <td >  <button   class="btnDelete btn-outline-success"   id="delrow"  >Delete</button>  </td>  </tr>  ');
      })

      $("#myTable").on('click', '.btnDelete', function() {
        $(this).closest('tr').remove();
      });

    });
  </script>


</body>