<?php include "head.php"; ?>
<div class="pure-g">
    <div class="pure-u-1">
        <a class="pure-button" href="index.php">Back</a>
    </div>
    <div class="pure-u-1">
        <form class="pure-form pure-form-aligned" action="submit-question.php" method="post">
            <fieldset>
                <legend>Submit a help request.</legend>

                <div class="pure-control-group">
                    <label for="class">Class</label>
                    <select id="class" name="clss">
                        <option>CS1</option>
                        <option>CS2</option>
                        <option>MOPS</option>
                        <option>COCS</option>
                        <option>Database Management</option>
                        <option>COPADS</option>
                        <option>PLC</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="pure-control-group">
                    <label for="assignment">Assignment</label>
                    <input class="pure-input-rounded" id="assignment" type="text" placeholder="Hw 1, Lab 1..." name="assn">
                </div>

                <div class="pure-control-group">
                    <label for="question">Question</label>
                    <input class="pure-input-rounded" id="question" type="text" placeholder="Question" name="qtext">
                </div>

                <input class="pure-button pure-button-primary" type="submit" value="Submit">
            </fieldset>
        </form>
    </div>
</div>