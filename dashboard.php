<?php
session_start();
?>
<?php
require 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Welcome to dashboard</title>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <link rel='stylesheet prefetch'
          href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link href="css/dashboard.css" rel="stylesheet">
    <style class="cp-pen-styles">@import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700&subset=latin-ext");
    </style>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body class="sidebar-is-reduced">
<?php
// ==========================database query=========================
if ($_SESSION["name"]){
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    $sql = "SELECT * FROM test WHERE userid='" . $_SESSION["id"] . "'";//id='emailid'
    $result = $conn->query($sql);

}
?>
<header class="l-header">
    <div class="l-header__inner clearfix">
        <div class="c-header-icon js-hamburger">
            <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span
                        class="bar-bot"></span></div>
        </div>
        <div class="c-header-icon has-dropdown"><span class="c-badge c-badge--header-icon animated shake">12</span><i
                    class="fa fa-bell"></i>
            <div class="c-dropdown c-dropdown--notifications">
                <div class="c-dropdown__header"></div>
                <div class="c-dropdown__content"></div>
            </div>
        </div>
        <div class="c-search">
            <input class="c-search__input u-input" placeholder="Search..." type="text"/>
        </div>
        <div style="margin-left: 522px;"><?php echo $_SESSION['id']; ?></div>
        <div class="header-icons-group">
            <a href="logout.php">
                <div class="c-header-icon logout"><i class="fa fa-power-off"></i></div>
            </a>
        </div>
    </div>
</header>
<div class="l-sidebar">
    <div class="logo">
        <div class="logo__txt">O</div>
    </div>
    <div class="l-sidebar__content">
        <nav class="c-menu js-menu">
            <ul class="u-list">
                <li class="c-menu__item is-active" data-toggle="tooltip" title="Proposals">
                    <div class="c-menu__item__inner"><i class="fa fa-file-text-o"></i>
                        <div class="c-menu-item__title"><span>Proposals</span></div>
                    </div>
                </li>
                <li class="c-menu__item has-submenu" data-toggle="tooltip" title="History">
                    <div class="c-menu__item__inner"><i class="fa fa-history"></i>
                        <div class="c-menu-item__title"><span>History</span></div>
                    </div>
                </li>
                <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Accounts">
                    <div class="c-menu__item__inner"><i class="fa fa-address-book-o"></i>
                        <div class="c-menu-item__title"><span>Accounts</span></div>
                    </div>
                </li>
                <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings">
                    <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
                        <div class="c-menu-item__title"><span>Settings</span></div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
</body>
<main class="l-main">
    <div class="content-wrapper content-wrapper--with-bg">
        <?php
        while ($row = $result->fetch_array()) {
            ?>
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <div class="media col-md-3">
                        <figure class="pull-left">
                            <img class="media-object img-rounded img-responsive" src="http://placehold.it/140x100"
                                 alt="placehold.it/140x100">
                        </figure>
                    </div>
                    <div class="col-md-5">
                        <h4 class="list-group-item-heading pb-3"><?php echo $row['title']; ?> </h4>
                        <p class="list-group-item-text"><?php echo $row['subject']; ?> </p>
                    </div>
                    <div class="col-md-3 pull-left">
                        <div class="container col-md-12">
                            <div class="row">
                                <div class="col-md-12 pull-left"><i class="fa fa-check-square"></i> General Manager
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pull-left"><i class="fa fa-check-square"></i> Project Manager
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pull-left"><i class="fa fa-square"></i> Tech Lead</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 text-center">
                        <p> 2 <small> approvals </small></p>
                        <button type="button" class="btn btn-primary btn-sm btn-block"
                                onclick="document.location = 'blogview.php?id=<?php echo $row['id']; ?>'">Open
                        </button>
                    </div>
                </a>

            </div>
            <?php
        }
        ?>
        <div id="pagination-item">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="dashboard.php?page=<?php ?>">Previous</a></li>

                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>

                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </div>
    <div class="text-center" style="margin-top: 20px; " class="col-md-2">
        <form method="post" action="#">
            <select name="limit-records" id="limit-records">
                <option disabled="disabled" selected="selected">---Limit Records---</option>
                <?php foreach ([10, 100, 500, 1000, 5000] as $limit): ?>
                    <option <?php if (isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?>
                            value="<?= $limit; ?>"><?= $limit; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
</main>
<!-- scripting for pagination button that perform active class assigne to a selected li -->
<script>
    $("ul li").on("click", function () {
        $("li").removeClass("active");
        $(this).addClass("active");
    });
</script>

</script>

<
script
src = '//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js' ></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://use.fontawesome.com/2188c74ac9.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<?php
} else echo "<h1>Please login first .</h1>";
$conn->close();
?>
</body></html>
<script src="js/dashboard.js"></script>