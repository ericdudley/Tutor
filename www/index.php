<?php include "head.php"; ?>
<body>
<div class="content">
    <div class="pure-g">
        <?php

        echo '<div class="pure-u-md-5-24"></div>';
        if (!file_exists('profile_pics/' . $_SERVER['uid'] . '.jpg')) {
            echo '<div id="welcome-header" class="pure-u-1 pure-u-md-14-24 card">
<h2 id="profile-pic-msg">'.$_SERVER["givenName"].', upload a profile pic!</h2>
<form id="pic-form" class="pure-form" action="upload-profile-pic.php" method="post" enctype="multipart/form-data">
    <p>Choose Profile Pic</p>
    <input id="pic-select-input" type="file" name="img">
</form>
</div>';
        } else {
            echo '<div id="welcome-header" class="pure-u-1 pure-u-md-14-24 card">
<h2>Hello, ' . $_SERVER["givenName"] . '.</h2>
<img class="profile_img" src="profile_pics/' . $_SERVER["uid"] . '.jpg">
<form id="pic-form" class="pure-form" action="upload-profile-pic.php" method="post" enctype="multipart/form-data">
    <p>Change Profile Pic</p>
    <input id="pic-select-input" type="file" name="img">
</form>

</div>';
        }
        echo '
<div class="pure-u-md-5-24"></div>';
        ?>
        <div class="pure-u-md-5-24 pi-wrapper"></div>
        <div id="position-indicator" class="pure-u-1 pure-u-md-14-24 card pi-wrapper"><h3>You are <span id="position-num">not</span> in line.</h3></div>
        <div class="pure-u-md-5-24 pi-wrapper"></div>
        <div class="pure-u-md-5-24"></div>
        <div id="tutor-list-card" class="pure-u-1 pure-u-md-7-24 card">
            <h3>Active Tutors <button onclick="refresh_tutors()"><i id="t-refresh" class="fa fa-refresh"></i></button></h3>
            </h3>
            <div id="tutor-list-container">
                <?php include "tutor-list.php"; ?>
            </div>
        </div>
<!--        <div class="pure-u-md-2-24"></div>-->
        <div id="help-queue-card" class="pure-u-1 pure-u-md-7-24 card">
            <!-- Button trigger modal -->
            <button id="help-modal-button" type="button" class="pure-button pure-button-primary" data-toggle="modal" data-target="#help-form-modal">
                Ask for Help
            </button>
            <a id="help-link-button" class="pure-button pure-button-primary" href="question-form.php">Ask for Help</a>
            <h3>Help Queue <button onclick="refresh_questions()"><i id="q-refresh" class="fa fa-refresh"></i></button></h3>
            <div id="question-list-container">
                <?php include "question-list.php"; ?>
            </div>
        </div>
        <div class="pure-u-md-5-24"></div>
        <div class="pure-u-md-5-24"></div>
        <div class="pure-u-1 pure-u-md-14-24 card" id="links-bar">
            <a href="https://www.cs.rit.edu/csdocs/pictures/tutoringschedule2165.pdf" target="_blank"><i class="fa fa-5x fa-calendar"></i></a>
            <a href="https://github.com/ericdudley/Tutor/issues" target="_blank"><i class="fa fa-5x fa-phone"></i></a>
            <a href="faq.php"><i class="fa fa-5x fa-question-circle"></i></a>
        </div>
        <div class="pure-u-md-5-24"></div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="help-form-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Help Request Form</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="help-form" class="pure-form pure-form-stacked" action="submit-question.php" method="post">
                        <fieldset>
                            <legend>Submit a help request.</legend>

                            <label for="class">Class</label>
                            <select id="class" name="clss" required>
                                <option value="">Select...</option>
                                <option>CS1</option>
                                <option>CS2</option>
                                <option>MOPS</option>
                                <option>COCS</option>
                                <option>Database Management</option>
                                <option>COPADS</option>
                                <option>PLC</option>
                                <option>Other</option>
                            </select>

                            <label for="assignment">Assignment</label>
                            <input id="assignment" type="text" placeholder="Hw 1, Lab 1..." name="assn" required>

                            <label for="question">Question</label>
                            <input id="question" type="text" placeholder="Question" name="qtext" required>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="help-form-button" type="button" class="pure-button pure-button-primary">Submit</button>
                    <button type="button" class="pure-button" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php' ?>
    <script>
        $(document).ready(function () {
            document.getElementById("pic-select-input").onchange = function () {
                document.getElementById("pic-form").submit();
            };

            document.getElementById("help-form-button").onclick = function () {
                document.getElementById("help-form").submit();
            };

            setInterval(refresh_questions, 90000);
            setInterval(refresh_tutors, 150000);

            update_position_indicator();
        });

        function refresh_questions() {
            $("#q-refresh").addClass("fa-spin");
            $.ajax({
                url: 'question-list.php',
                success: function (msg) {
                    $('#question-list-container').html(msg);
                    update_position_indicator();
                    $("#q-refresh").removeClass("fa-spin");
                }
            });
        }

        function refresh_tutors(){
            $("#t-refresh").addClass("fa-spin");
            $.ajax({
                url: 'tutor-list.php',
                success: function (msg) {
                    $('#tutor-list-container').html(msg);
                    $("#t-refresh").removeClass("fa-spin");
                }
            });
        }

        function update_position_indicator(){
            var position = Infinity;
            $("#question-ul li").each(function () {
                $t = $(this);
                if($t.data('username') === username && $t.data('position') < position){
                    position = $t.data('position');
                }
            });
            if(position !== Infinity){
                $('#position-num').html(position);
            } else {
                $('#position-num').html('not');
            }
        }
    </script>
</div>
</body>
</html>