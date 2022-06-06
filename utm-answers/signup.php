<?php

require('src/LassoLead.php');
require('src/RegistrantSubmitter.php');

$clientId  = '1111';
$projectId = '1001';
$apiKey = '1x1x1';

if (empty($clientId) || empty($projectId) || empty($apiKey)){
	throw new Exception('Required parameters are not set, please check that
							your $clientId, $projectId and $apiKey
							are configured correctly');
}

$lead = new LassoLead(
	$_REQUEST['FirstName'],
    $_REQUEST['LastName'],
    $projectId,
    $clientId
);

$lead->addPhone($_REQUEST['Phone']);

$lead->addEmail($_REQUEST['Email']);

/* Questions (text answer)
 *
 * Only for questions that require text input answers
 * $lead->answerQuestionByIdForText($questionId,$_REQUEST['Questions'][$questionId]);
 */
$lead->answerQuestionByIdForText(107615, $_REQUEST['utm_campaign']);
$lead->answerQuestionByIdForText(107616, $_REQUEST['utm_content']);
$lead->answerQuestionByIdForText(132009, $_REQUEST['utm_id']);
$lead->answerQuestionByIdForText(132008, $_REQUEST['utm_medium']);
$lead->answerQuestionByIdForText(107617, $_REQUEST['utm_source']);
$lead->answerQuestionByIdForText(107618, $_REQUEST['utm_term']);

$lead->sendAssignmentNotification();

$submitter = new RegistrantSubmitter();
$curl      = $submitter->submit('https://api.lassocrm.com/registrants', $lead, $apiKey);
