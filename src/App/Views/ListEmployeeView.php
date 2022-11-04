<div class="content">
    <span><?= $first_name ?></span>
    <span><?= $last_name ?></span>
    <span><?= $date ?></span>
    <span><?= $salary ?></span>
    <span>
        <a href="index.php?method=update&id=<?= $id ?>&first_name=<?= $first_name ?>&last_name=<?= $last_name ?>&date=<?= $date ?>&salary=<?= $salary ?>">
            <button>Edit</button>
        </a>
    </span>
    <span>
        <a href="index.php?method=delete&id=<?= $id ?>">
            <button>Delete</button>
        </a>
    </span>
</div>


