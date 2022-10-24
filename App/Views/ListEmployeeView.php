<tr>
    <td><?= $first_name ?></td>
    <td><?= $last_name ?></td>
    <td><?= $date ?></td>
    <td><?= $salary ?></td>
    <td>
        <a href="index.php?method=update&id=<?= $id ?>&first_name=<?= $first_name ?>&last_name=<?= $last_name ?>&date=<?= $date ?>&salary=<?= $salary ?>">
            <button>Edit</button>
        </a>
    </td>
    <td><a href="index.php?method=delete&id=<?= $id ?>">
            <button>Delete</button>
        </a></td>
</tr>


