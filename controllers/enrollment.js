var app = angular.module('enrollment',['account-module','app-module']);

app.controller('enrollmentCtrl',function($scope,app) {
	
	$scope.formHolder = {};
	$scope.app = app;

	app.data($scope);
	app.list($scope);
	
});

