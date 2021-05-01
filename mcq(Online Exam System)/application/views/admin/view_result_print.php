<html>
    <head>
        <style type="text/css">
            .main{
                text-align: center;
                float: left;
                margin-left: 5%;
                width: 400px;
                background-color: #ffffff;
                border:1px solid gray;
            }
            .title_paragraph{
            float: left;
            width: 100%;
            background-color: #f8f8f8;
            min-height: 54px;
            font-family: Times;
            }
            .print_div1{
                float: left;
                width: 50%;
                
            }
            .print_div2{
                float: left;
                width: 50%;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="title_paragraph">
                <textarea style="width: 100%; border: none; height: 44px; overflow: hidden;"></textarea>
            </div>
            <div class="print_div1">
                <table bgcolor="black" cellspacing="1" width="100%">
                    <tr bgcolor="#fff">
                        <th>Roll No</th>
                        <th>Full Mark</th>
                    </tr>
                    <?php
                    foreach($result as $row) {
                        ?>
                    <tr bgcolor="#fff" align="center">
                        <td><?php echo $row->roll; ?></td>
                        <td><?php echo $row->obtained_mark; ?></td>
                    </tr>

                        <?php
                    } ?>
                </table>
            </div>
            <!---Print Div 2----->
            <div class="print_div2">
                <table bgcolor="black" cellspacing="1" width="100%">
                    <tr bgcolor="#fff">
                        <th>Roll No</th>
                        <th>Full Mark</th>
                    </tr>
                    <?php
                    foreach($result1 as $row1) {
                        ?>
                    <tr bgcolor="#fff" align="center">
                        <td><?php echo $row1->roll; ?></td>
                        <td><?php echo $row1->obtained_mark; ?></td>
                    </tr>

                        <?php
                    } ?>
                </table>
            </div>
        </div>
    </body>
</html>