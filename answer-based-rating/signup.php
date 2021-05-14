<?php

require('src/LassoLead.php');
require('src/RegistrantSubmitter.php');

/* These variables should only be attached on the server side
 * and should not be hidden fields on the registration form
 * Note that $apiKey is where the Lasso UID is placed.
 */
$clientId  = '1111';
$projectId = '1001';
$apiKey = '1x1x1';

if (empty($clientId) || empty($projectId) || empty($apiKey)){
	throw new Exception('Required parameters are not set, please
				check that your $clientId, $projectId and $apiKey are
				configured correctly');
}

/* Constructing and submitting a lead:
 * Map form fields to the lead object and submit
 */
$lead = new LassoLead(
	$_REQUEST['FirstName'],
	$_REQUEST['LastName'],
	$projectId,
	$clientId
);

$lead->addPhone($_REQUEST['Phone']);

$lead->addEmail($_REQUEST['Email']);

/* Rating
 *
 * For assigning a rating based on an answer to a question
 * if (array_key_exists($questionId,$_POST['Questions']) && $_POST['Questions'][$questionId]==$answerId) {
 * 		$lead->setRating($rating);
 * } 
 * else {
 * 		$lead->setRating($rating);
 * }
 */
if (array_key_exists('1111',$_POST['Questions']) && $_POST['Questions']['1111']=='1001') {
	$lead->setRating('R');
} 
else {
	$lead->setRating('N');
}

/* Questions (select answer)
 *
 * For any number of questions where answers are selected
 */
foreach($_REQUEST['Questions'] as $questionId => $value){
	 $lead->answerQuestionById($questionId, $value);
}

$lead->sendAssignmentNotification();

$submitter = new RegistrantSubmitter();
$curl      = $submitter->submit('https://api.lassocrm.com/registrants', $lead, $apiKey);
