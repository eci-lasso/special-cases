<h1>Special Cases</h1>

<h3><a name="answer-utm">Capture UTM Information as Answers</a></h3>
<p>To capture UTM information from the URL of the form, define hidden input fields for each value in <a href="https://github.com/eci-lasso/special-cases/blob/main/utm-answers/signup.html">signup.html</a>.</p>
<p>A manual input question for each UTM field must exist in Lasso and then each field is to be mapped in <a href="https://github.com/eci-lasso/special-cases/blob/main/utm-answers/signup.php">signup.php</a>.</p>

<h3><a name="answer-rating">Submit a Rating Based on an Answer</a></h3>
<p>Define a question with radio button or single-select drop-down menu answers in <a href="https://github.com/eci-lasso/special-cases/blob/main/answer-based-rating/signup.html">signup.html</a>.</p>
<p>Note that Sales Details can only have one value so multi-answer questions will not work as expected.</p>
<p>Pass the values and assign ratings to the answers in <a href="https://github.com/eci-lasso/special-cases/blob/main/answer-based-rating/signup.php">signup.php</a>.</p>
<p>This method can also be applied for assigning values for other Sales Details based on answers</p>

<h3><a name="answer-project">Submit to Projects Based on Answers</a></h3>
<p>Define a question with checkbox or multi-select drop-down menu answers in <a href="https://github.com/eci-lasso/special-cases/blob/main/answer-based-projects/signup.html">signup.html</a> and make the question a required field on the form.</p>
<p>Remove any validation checks for Project ID in <a href="https://github.com/eci-lasso/special-cases/blob/main/answer-based-projects/signup.php">signup.php</a>. Pass an empty array for projects and then create a loop to map each answer ID for the question to a project ID. Pass projects and questions when contructing a lead.</p>
