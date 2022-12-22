<?php

require('src/LassoLead.php');
require('src/RegistrantSubmitter.php');

$clientId  = '1111';
$apiKey = '1x1x1';

if (empty($clientId) || empty($apiKey)){
  throw new Exception('Required parameters are not set, please check that
                        your $clientId and $apiKey
                        are configured correctly');
}

$projects = [];

/* Associating projects to answers
 * 
 * foreach($_REQUEST['Questions'][$questionId] as $index => $answer){
 *   switch($answer) {
 *     case $answerId:
 *       $projects[] = $projectId;
 *       break;
 *     case $answerId:
 *       $projects[] = $projectId;
 *       break;
 *     case $answerId:
 *       $projects[] = $projectId;
 *       break;
 *     default:
 *       break;
 *   }
 * }
 */
foreach($_REQUEST['Questions'][1111] as $index => $answer){
  switch($answer) {
    case 101:
      $projects[] = 1111;
      break;
    case 102:
      $projects[] = 2222;
      break;
    case 103:
      $projects[] = 3333;
      break;
    default:
      break;
  }
}

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

$lead->sendAssignmentNotification();

$submitter = new RegistrantSubmitter();
$curl      = $submitter->submit('https://api.lassocrm.com/registrants', $lead, $apiKey);
