<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <title>Todo List</title>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <form method="post" action="/create-todo">
            <div class="mb-3">
                <label for="todoInput" class="form-label">Tambahkan Acara</label>
                <input type="text" class="form-control" id="todoInput" name="todo" placeholder="Isikan Acara">
            </div>
            <div class="mb-3">
                <label for="deadlineInput" class="form-label">Deadline</label>
                <input type="date" class="form-control" id="deadlineInput" name="deadline">
            </div>
            <button type="submit" class="btn btn-primary" name="tambahButton">Tambahkan</button>
        </form>
        <br></br>
        <div class="mb-3">
        <table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Todo</th>
            <th>Deadline</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($todos)) {
            $count = 1;
            foreach ($todos as $todo) {
                echo "<tr>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . $todo->todo . "</td>"; 
                echo "<td>" . $todo->deadline . "</td>"; 
                echo "<td>
                    <a href='delete-todo/" . $todo->id . "' class='btn btn-danger'>
                        <i class='bi bi-trash'></i> Hapus
                    </a>
                </td>";
                echo "</tr>";
                $count++;
            }
        }
        ?>
    </tbody>
</table>

        </div>
    </div>
</body>
</html>
