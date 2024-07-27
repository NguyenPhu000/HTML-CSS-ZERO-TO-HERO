<div id="content">
    <div id="video">
        <video height="300px" controls autoplay>
            <source src="./img_NguyenHongPhu/2023-03-20 21-18-58.mkv" type="video/mp4">
        </video>
    </div>
</div>
<hr>
<div id="menu">
    no ajax <br>
    <a href="index.php?page=page01">Page 01</a>
    <a href="index.php?page=page02">Page 02</a>
    <a href="index.php?page=page03">Page 03</a>
    <a href="index.php?page=page04">Page 04</a>
    <hr>
    use ajax <br>
    <b class="link_menu" value="page01">Page 01</b>
    <b class="link_menu" value="page02">Page 02</b>
    <b class="link_menu" value="page03">Page 03</b>
    <b class="link_menu" value="page04">Page 04</b>
    <hr>
</div>
<hr>
<div id="get_content">
    <?php
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
        include './pageJS/' . $page . '.php';
    } else {
        echo "Nothing to show!";
    }
    ?>
</div>