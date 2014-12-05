<?php
if(isset($_POST['formDelete'])){
    if(isset($_POST['quoteid']) && !empty($_POST['quoteid'])){
        require_once('config.php');
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) 
        or die ('Cannot connect to db');
        $quoteid = $_POST['quoteid'];
        echo "DELETE FROM quotes WHERE quoteid =".$quoteid;
        $result = $conn->query("DELETE FROM quotes WHERE quoteid =".$quoteid);
    }
}

    require_once('config.php');
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die ('Cannot connect to db');
    $result = $conn->query("SELECT quoteid, quote, cat.catid catid, cat.name cat, scat.catid catid, scat.name scat, author FROM quotes q
                           INNER JOIN category cat ON q.catid = cat.catid LEFT OUTER JOIN category scat ON q.subcatid = scat.catid order by quoteid");
    echo "<table border='1px solid black'>";
    echo "<tr>
            <td>
                <b>Category</b>
            </td>
            <td>
                <b>Sub-Category</b>
            </td>
            <td>
                <b>Quote</b>
            </td>
            <td>
                <b>Author</b>
            </td>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$row[cat]</td>
                <td>$row[scat]</td>
                <td>$row[quote]</td>
                <td>$row[author]</td>";
        echo "<td>
                <form action='".$_SERVER['PHP_SELF']."' method='post'>
                    <input type='hidden' id='quoteid' name='quoteid' value='$row[quoteid]' />
                    <input type='submit' name='formDelete' id='formDelete' value='Delete' />
                </form>
            </td>
            </tr>";
    }
    echo "</table>";
?>