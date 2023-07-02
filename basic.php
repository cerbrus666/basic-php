<?php

$connect = mysqli_connect('localhost', 'user', '1234', 'database');

if (mysqli_connect_errno()) {
    exit("Failed to connect to MySQL: " . mysqli_connect_error());

}

if ($stm = $connect->prepare('SELECT * FROM posts')) {
    $stm->execute();
    $result = $stm->get_result();

    if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author's ID</th>
                <th>Content</th>


            </tr>

            <tr>
                <?php while ($record = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <?php echo $record['id'] ?>
                    </td>
                    <td>
                        <?php echo $record['title'] ?>
                    </td>
                    <td>
                        <?php echo $record['author'] ?>
                    </td>
                    <td>
                        <?php echo $record['content'] ?>
                    </td>

                </tr>
            <?php } ?>
        </table>

    <?php }

} ?>