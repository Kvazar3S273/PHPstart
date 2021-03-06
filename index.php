<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новини</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php include "navbar.php"; ?>

<div class="container">
    <h1>Список новин</h1>
    <?php
    include "connection_database.php";
    include "modal_delete.php";
    $sql = "SELECT * FROM news";
    $reader = $dbh->query($sql);
    ?>
    <div class="container">
        <div class="row">
            <div class=" col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Назва</th>
                        <th scope="col">Опис</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($reader as $row) {
                        echo "
        <tr>
            <th>{$row['id']}</th>
            <td>{$row['name']}</td>
            <td>{$row['description']}</td>
            <td>
                <img src='/images/{$row['image']}' alt='image' width='100'/>
            </td>
            <td>
                <a href='#' class='btn btn-danger btnDelete' 
                data-id='{$row['id']}' 
                data-name='{$row['name']}' 
                data-image='{$row['image']}' 
                id='delete'
                >Видалити</a>
            </td>
            <td>
                <a href='edit.php?id=${row["id"]}' 
                class='btn btn-success btnEdit' 
                >Редагувати</a>
            </td>
        </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php //include "modal_delete.php"; ?>

<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/axios.min.js"></script>

<script>
    const mod = document.querySelector('#myModal');
    const modal = new bootstrap.Modal(mod, {});
    window.addEventListener('load', function () {
        const list = document.querySelectorAll(".btnDelete");
        let removeId = 0; //id element delete
        let path = '';
        //let item = '';
        for (let i = 0; i < list.length; i++) {
            list[i].addEventListener("click", function (e) {
                e.preventDefault();
                removeId = e.currentTarget.dataset.id;
                //item = e.currentTarget.dataset.name;
                path = e.currentTarget.dataset.image;
                // mod.querySelector('.context').innerHTML = '<span>' + item + '</span>';
                modal.show();
            })
        }
        //Нажали кнопку видалити
        document.querySelector("#btnDeleteNews").addEventListener("click", function () {
            const formData = new FormData();
            formData.append("id", removeId);
            axios.post("/delete.php", formData)
                .then(resp => {
                    location.reload();
                });
        });
    });
</script>


</body>
</html>
