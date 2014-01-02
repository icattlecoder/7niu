<?php
require_once("php-sdk/qiniu/rs.php");
$accessKey = 'iN7NgwM31j4-BZacMjPrOQBs34UG1maYCAQmhdCV';
$secretKey = '6QTOr2Jg1gcZEWDQXKOGZh5PziC2MCV5KsntT70j';
$bucket = "qtestbucket";
Qiniu_SetKeys($accessKey, $secretKey);
$mac = new Qiniu_Mac($accessKey,$secretKey);
if($_POST["putExtra"]){
	$extra = json_decode($_POST["putExtra"]);
	if($extra){
		$scope = $bucket.":".$extra->{'key'};
		$policy = new Qiniu_RS_PutPolicy($scope);
		$policy->Expires = 3600*24*30;
		echo $policy->token($mac);
	}
}
?>