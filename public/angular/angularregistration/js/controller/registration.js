/**
 * Created by Kamran on 29-Nov-15.
 */

myApp.controller('RegistrationController',
    ['$scope','Authentication',
        function($scope,Authentication){


    $scope.login=function() {
        //$scope.message='Welcome to ikamy.ch ' + $scope.user.email;
        Authentication.login($scope.user);
    };// login

    $scope.logout=function(){
        Authentication.logout();
    }

    $scope.register=function() {
        Authentication.register($scope.user);
    }; // register
}]); // controller

