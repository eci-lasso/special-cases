<?php

require('src/LassoLead.php');
require('src/RegistrantSubmitter.php');

/* These variables should only be attached on the server side
 * and should not be hidden fields on the registration form
 * Note that $apiKey is where the Lasso UID is placed.
 */
$clientId  = '1111';
$apiKey = '1x1x1';

if (empty($clientId) || empty($apiKey)){
	throw new Exception('Required parameters are not set, please
						check that your $clientId and $apiKey are
						configured correctly');
}

/* Associating projects to answers
 * 
 * foreach($_REQUEST['Questions'][1111] as $index => $answer){
 * 		switch($answer) {
 * 			case 1001:
 * 				$projects[] = 1111;
 * 				break;
 * 			case 1002:
 * 				$projects[] = 2222;
 * 				break;
 * 			case 1003:
 * 				$projects[] = 3333;
 * 				break;
 * 			default:
 * 				break;
 * 		}
 * }
 */
$projects = [];

foreach($_REQUEST['Questions'][1111] as $index => $answer){
	switch($answer) {
		case 1001:
			$projects[] = 1111;
			break;
		case 1002:
			$projects[] = 2222;
			break;
		case 1003:
			$projects[] = 3333;
			break;
		default:
			break;
	}
}

/* Constructing and submitting a lead:
 * Map form fields to the lead object and submit
 */
$lead = new LassoLead(
	$_REQUEST['FirstName'],
    $_REQUEST['LastName'],
    $projects[0],
    $clientId
);

/* Projects
 * 
 * For submitting to selected projects
 */
foreach($projects as $index => $projectId){
	if ($index == 0){
		continue;
	}
	$lead->addProject($projectId);
}

/* Questions (select answer)
 *
 * For any number of questions where answers are selected
 */
foreach($_REQUEST['Questions'] as $questionId => $value){
	 $lead->answerQuestionById($questionId, $value);
}

$lead->addPhone($_REQUEST['Phone']);

$lead->addEmail($_REQUEST['Email']);

$submitter = new RegistrantSubmitter();
$curl      = $submitter->submit('https://api.lassocrm.com/registrants', $lead, $apiKey);