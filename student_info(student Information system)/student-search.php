<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Student Search</title>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.search-box input[type="text"]').on("keyup input", function () {
                    /* Get input value on change */
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings(".result");
                    if (inputVal.length) {
                        $.get("backend-search.php", {term: inputVal}).done(function (data) {
                            // Display the returned data in browser
                            resultDropdown.html(data);
                        });
                    } else {
                        resultDropdown.empty();
                    }
                });

                // Set search input value on click of result item
                $(document).on("click", ".result p", function () {
                    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    $(this).parent(".result").empty();
                });
            });
        </script>

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="well">
                        <form class="form-horizontal">
                            <h3 align="center"> <span class="label label-primary">Student Information Search</span></h3>
                            <br/>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-lg-1 control-label">Search</label>
                                <div class="col-sm-10">
                                    <div class="search-box">
                                        <input type="text" autocomplete="off" placeholder="Search by Student Name" class="form-control"/>
                                        <div class="result"></div> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

