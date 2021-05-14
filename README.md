<h1>Special Cases</h1>

<h3><a name="answer-utm">Capture UTM Information as Answers</a></h3>
<p>To capture UTM information from the URL of the form, define hidden input fields for each value in <a href="https://github.com/eci-lasso/special-cases/blob/main/utm-answers/signup.html">signup.html</a>.</p>
<pre>&lt;input type="hidden" name="UTMName" value="utmName-Value"/&gt;</pre>
<p>A manual input question for each UTM field must exist in Lasso and then each field is to be mapped in <a href="https://github.com/eci-lasso/special-cases/blob/main/utm-answers/signup.php">signup.php</a>.</p>
<pre>$lead->answerQuestionByIdForText($questionId, $_REQUEST['UTMName'])</pre>

<h3><a name="answer-rating">Submit a Rating Based on an Answer</a></h3>
<p></p>

<h3><a name="answer-project">Submit to Projects Based on Answers</a></h3>
<p></p>
