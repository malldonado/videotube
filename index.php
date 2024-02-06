<!DOCTYPE html>
<html>
<head>
    <title>VideoTube</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/commonActions.js"></script>
</head>
<body>
    
    <div id="pageContainer">

        <div id="mastHeadContainer">
         <button class="navShowHide">
            <img src="assets/images/icons/menu.png" alt="">
         </button>
         <a class="logoContainer" href="index.php">
            <img src="assets/images/icons/VideoTubeLogo.png" title="title" alt="Site logo">
         </a>
         <div class="searchBarContainer">
            <form action="search.php" method="GET">
                <input type="text" class="searchBar" name="term" placeholder="Search...">
                <button class="searchButton">
                    <img src="assets/images/icons/search.png" alt="">
                </button>
            </form>
         </div>
        </div>

        <div id="sideNavContainer" style="display: block;">
        
        </div>

        <div id="mainSectionContainer">
            <div id="mainContentContainer">
                hello everybody
            </div>
        </div>

    </div>

</body>
</html>