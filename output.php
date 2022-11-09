<?php
while ($row = $result->fetch()) {
    echo "<tr>";
    echo "<td>" . $row["id_book"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["pages"] . "</td>";
    echo "<td>" . $row["author"] . "</td>";
    echo "</tr>";
}
