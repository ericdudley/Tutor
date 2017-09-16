<footer class="footer-distributed">

    <div class="footer-right">
        <a id="github-link" href="https://github.com/ericdudley/Tutor" target="_blank">
            Contribute to Tutor on <i class="fa fa-github fa-2x"></i></a>

    </div>

    <div class="footer-left">

        <p class="footer-links">
            <a href="index.php">View Dashboard</a>
            ·
            <a href="question-form.php">Request Help</a>
            <?php
            if (Tutor::verify($_SERVER['uid'])) {
                echo '·
            <a href="tutor-admin.php">Manage Tutors</a>';
            }
            ?>
        </p>

        <p>Created by <a class="pure-button" href="http://ericdudley.com" target="_blank">Eric Dudley</a> &copy; 2017
        </p>
    </div>

</footer>