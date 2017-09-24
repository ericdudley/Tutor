<?php
include "head.php";

echo '
<div class="content">
';
echo "
<div class=\"pure-g\">
    <div class=\"pure-u-1 spacer\"></div>
    <div class=\"pure-u-md-3-8\"></div>
    <div class=\"pure-u-1 pure-u-md-1-4 card\">
    <a class=\"pure-button back-button\" href=\".\">Back</a>
<br/>";
echo "            <h3>Stats</h3>
            <ul>
                <li>Total questions asked: " . Question::countAll() . "</li>
                <li>Average wait time: " . sprintf("%d.1", Question::avgWaitTime()) . " minutes</li>
                <li>Tutor with most questions answered: " . Question::bestTutor() . "</li>

            </ul>";
echo '    </div>
</div></div>';
include 'footer.php';
echo '
</body>';