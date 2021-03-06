<?php include "head.php"; ?>
<div class="content">
    <div class="pure-g">
        <div class="pure-u-1 spacer"></div>
        <div class="pure-u-sm-1-4"></div>
        <div class="pure-u-1 pure-u-sm-1-2 card">
            <a class="pure-button" href="index.php">Back</a>
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
                    <textarea id="question" placeholder="Question" name="qtext" required></textarea>

                    <input class="pure-button pure-button-primary" type="submit" value="Submit">
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
</body>
