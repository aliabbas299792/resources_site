<?php
include 'db.link.php';
include 'verifUser.php';
$title = "Contact";
include 'head.php';
?>
<body>
    <?php include 'nav.php'; ?>
    <form action="formProcessor" method="GET" id="contactForm">
        <table>
            <tr>
                <td colspan="2"><h1>Contact</h1></td>
            </tr>
            <tr>
                <td>Name: </td>
                <td><input type="text" placeholder="Name" name="name" id="contact_name"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" placeholder="Email" name="email" id="contact_email"></td>
            </tr>
            <tr>
                <td colspan="2"><textarea name="comments" placeholder="Your comments" id="contact_comments"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit" id="contact_submit"></td>
            </tr>
        </table>
    </form>
    <script src="/js/contactValidator.js"></script>
    <?php include 'footer.php'; ?>
</body>