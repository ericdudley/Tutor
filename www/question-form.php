<?php include "head.php"; ?>
<div class="pure-g">
    <div class="pure-u-1">
        <a class="pure-button" href="index.php">Back</a>
    </div>
    <div class="pure-u-sm-2-5"></div>
    <div class="pure-u-1 pure-u-sm-1-5">
        <form id="question-form" class="pure-form pure-form-stacked" action="submit-question.php" method="post">
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

                <input class="pure-button pure-button-primary" type="submit" value="Submit">
            </fieldset>
        </form>
    </div>
</div>
</body>