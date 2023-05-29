<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple and Beautiful Table</title>
    <style>
        /* CSS styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>My banknotes</h1>
<table>
    <thead>
    <tr>
        <th>Serial Number</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php for($i=1; $i <6; $i++):?>
    <tr>
        <td><a href="banknote"><?php echo ($i*25436234)?></a></td>
        <td><?php echo ($i*1000)?></td>
    </tr>

    <?php endfor;?>
    </tbody>
</table>
</body>
</html>
