<?php
include "db.link.php";
include 'verifUser.php';
    $title = "Editor Use";
    include "head.php";
?>
    
    <body>
        <?
        include "nav.php";
        ?>
        <b><h1 class="mainHeader">How to use</h1></b>
        <table id="howToUse" border=1>
            <tr>
                <td>[ul] and [/ul]</td>
                <td>[ul] will begin a list and [/ul] will end a list,<br> it must contain [li] and [/li] elements within</td>
            </tr>
            <tr>
                <td>[ol] and [/ol]</td>
                <td>[ol] will begin an numbered list and [/ol] will end an numbered list,<br> it must contain [li] and [/li] elements within</td>
            </tr>
            <tr>
                <td>[li] and [/li]</td>
                <td>[li] is the tag to signify the beggining of a list item <br> and [/li] is the tag to signify the end</td>
            </tr>
            <tr>
                <td>[h1] and [/h1]</td>
                <td>Place text inside the [h1] and [/h1] tags to make <br> it appear as a title</td>
            </tr>
            <tr>
                <td>[h2] and [/h2]</td>
                <td>Place text inside the [h2] and [/h2] tags to make <br> it appear as a smaller title than [h1]</td>
            </tr>
            <tr>
                <td>[h3] and [/h3]</td>
                <td>Place text inside the [h3] and [/h3] tags to make <br> it appear as a small title</td>
            </tr>
            <tr>
                <td>[b] and [/b]</td>
                <td>Text within the [b] and [/b] tags will appear in bold</td>
            </tr>
            <tr>
                <td>[i] and [/i]</td>
                <td>Text within the [i] and [/i] tags will appear in italics</td>
            </tr>
            <tr>
                <td>[u] and [/u]</td>
                <td>Text within the [u] and [/u] tags will appear underlined</td>
            </tr>
            <tr>
                <td>[hr]</td>
                <td>This adds a horizontal line below your text</td>
            </tr>
            <tr>
                <td>[img src='imageurl']</td>
                <td>Add in the image URL between the quotes  <br>after the 'src' to add and image</td>
            </tr>
            <tr>
                <td>[link href='link']</td>
                <td>Add in the image URL between the quotes  <br>after the 'href' to add and image</td>
            </tr>
            <tr>
                <td>[code] and [/code]</td>
                <td>Highlights text to make it look like code</td>
            </tr>
            <tr>
                <td>[highlight] and [/highlight]</td>
                <td>Highlights text with a background colour</td>
            </tr>
            <tr>
                <td>[squared]</td>
                <td>It adds in &sup2;</td>
            </tr>
            <tr>
                <td>[cubed]</td>
                <td>It adds in &sup3;</td>
            </tr>
            <tr>
                <td>[gte]</td>
                <td>It adds in &ge;</td>
            </tr>
            <tr>
                <td>[lte]</td>
                <td>It adds in &le;</td>
            </tr>
            <tr>
                <td>[approx]</td>
                <td>It adds in &asymp;</td>
            </tr>
            <tr>
                <td>[pi]</td>
                <td>It adds in &pi;</td>
            </tr>
            <tr>
                <td>[multiply]</td>
                <td>It adds in &times;</td>
            </tr>
            <tr>
                <td>[divide]</td>
                <td>It adds in &divide;</td>
            </tr>
            <tr>
                <td>[space]</td>
                <td>It adds in a space.</td>
            </tr>
            <tr>
                <td>[theta]</td>
                <td>It adds in &#1012;</td>
            </tr>
            <tr>
                <td>[lambda]</td>
                <td>It adds in &lambda;</td>
            </tr>
            <tr>
                <td>[gamma]</td>
                <td>It adds in &gamma;</td>
            </tr>
            <tr>
                <td>[degree]</td>
                <td>It adds in &deg;</td>
            </tr>
            <tr>
                <td>[table] and [/table]</td>
                <td>It adds in a table. <br>(must be populated by [tr]'s and [td]'s)</td>
            </tr>
            <tr>
                <td>[tr] and [/tr]</td>
                <td>It adds in a row for the table. <br> (must be inside table, and must contain [td])</td>
            </tr>
            <tr>
                <td>[td] and [/td]</td>
                <td>It adds in a table data cell. <br> (must be inside table row)</td>
            </tr>
            <tr>
                <td>[td rowspan='number'] <br>and [/td]</td>
                <td>This time it can span a number of rows.</td>
            </tr>
            <tr>
                <td>[td rowspan='columns'] <br>and [/td]</td>
                <td>This time it can span a number of columns.</td>
            </tr>
        </table>
        <pre id="preText"></pre>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>