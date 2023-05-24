<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Form Order</title>
</head>

<body>
    <div class="container">
        <h1>Order Here!</h1>
        <form id="pujadel">
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" name="text" placeholder="Item's Name" required>
                    <label for="floatingInputGrid">Input Item</label>
                </div>
            </div>
            
            <div class="col-md">
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInputGrid" name="number" placeholder="Number of Item" required>
                    <label for="floatingInputGrid">Number</label>
                </div>
            </div>
        </div>
        <br>

        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit">Order!</button>
        </div>
        </form>

        <!-- Table Response -->
        <br>
        <table id="tableResponse" class="table mt-3 table-fixed table-bordered">
            <thead>
                <tr>
                    <th class="col-6 text-center">Number</th>
                    <th class="col-6 text-center">Item</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
    <!-- JQuery -->
    <script>
       $(document).ready(function() {
       $('#pujadel').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: 'form-b.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                let tableData = '';

                $.each(data, function(index, value) {
                    tableData += '<tr><td>' + (index + 1) + '</td><td>' + value + '</td></tr>';
                });

                $('#tableResponse tbody').html(tableData).hide().fadeIn('slow');
            }
        });
    });
});
    </script>

</body>

<style>
    body {
        font-family: Poppins, sans-serif;
        background-color: #BBDED6;
    }
    .container {
        max-width: 1000px;
        margin-top: 50px;
        padding: 20px;
        background-color: #FAE3D9;
        border-radius: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        font-weight: bold;
        color: #F65A83;
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #F65A83;
    }
    button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #F65A83;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #FF9999;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    } 
    th, td, tr {
        padding: 10px;
        border-width: 2px;
        border-style: solid;
        border-color: #F65A83;
        text-align: center;
    }
    th {
        font-weight: bold;
        color: #F65A83;
    }
    thead {
        background-color: #BBDED6;
    }
</style>

</html>