<h1>Special Cases</h1>

<p>Update the following fields in <code>signup.php</code> to test a submission:</p>
<ul>
<li><code>clientId</code></li>
<li><code>projectId</code> (except for submissions to multiple projects)</li>
<li><code>apiKey</code> (This is the <b>LassoUID</b> from Lasso)</li>
<li>Any other project-specific fields (e.g., <code>setRating</code>, <code>setSourceType</code>... etc.)</li>
</ul>

<p> Update the URL for <code>window.location</code> in <code>signup.html</code> and submit.</p>

<h3><a name="answer-utm">Capture UTM Information as Answers</a></h3>
<p>To capture UTM information from the URL of the form, define hidden input fields for each value in <a href="https://github.com/eci-lasso/special-cases/blob/main/utm-answers/signup.html">signup.html</a>.</p>
<p>A manual input question for each UTM field must exist in Lasso and then each field is to be mapped in <a href="https://github.com/eci-lasso/special-cases/blob/main/utm-answers/signup.php">signup.php</a>.</p>

<h3><a name="answer-rating">Submit a Rating Based on an Answer</a></h3>
<p>Define a question with radio button or single-select drop-down menu answers in <a href="https://github.com/eci-lasso/special-cases/blob/main/answer-based-rating/signup.html">signup.html</a>.</p>
<p>Note that Sales Details (Rating, Source Type, Secondary Source Type... etc) can only have one value so multi-answer questions are not recommended.</p>
<p>Pass the values and assign ratings to the answers in <a href="https://github.com/eci-lasso/special-cases/blob/main/answer-based-rating/signup.php">signup.php</a>.</p>
<p>This method can also be applied for assigning values for other Sales Details based on answers</p>

<h3><a name="answer-project">Submit to Projects Based on Answers</a></h3>
<p>Define a required question field with checkbox or multi-select drop-down menu answers in <a href="https://github.com/eci-lasso/special-cases/blob/main/answer-based-projects/signup.html">signup.html</a>.</p>
<p>Remove any validation checks for Project ID in <a href="https://github.com/eci-lasso/special-cases/blob/main/answer-based-projects/signup.php">signup.php</a>. Pass an empty array for projects and then create a loop to map each answer ID for the question to a project ID. Pass <code>$projects[0]</code> when constructing a lead.</p>
