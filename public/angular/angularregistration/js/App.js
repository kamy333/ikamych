/**
 * Created by Kamran on 29-Nov-15.
 */

var myApp=angular.module('MyApp',
    ['ngRoute','firebase'])
    .constant('FIREBASE_URL','https://anikamy01.firebaseio.com/');


myApp.run(['$rootScope','$location',function($rootScope, $location){
    $rootScope.$on('$routeChangeError',
        function(event, next, previous, error){
        if (error=='AUTH_REQUIRED'){
            $rootScope.message='Sorry you must login to access the page';
            $location.path('/login');
        } // AUTH_REQUIRED
    }); //event info
}]); //run

myApp.config(['$routeProvider', function($routeProvider){
    $routeProvider.
        when('/login',{
        templateUrl:'views/login.php',
        controller:'RegistrationController'
    }).
    when('/register',{
        templateUrl:'views/register.php',
        controller:'RegistrationController'
    }).
    when('/success',{
        templateUrl:'views/success.php',
        controller:'SuccessController',
        resolve:{
            currentAuth:function(Authentication){
                return Authentication.requireAuth();
            } // currentAuth
        } //resolve
    }).
        otherwise ({
        redirectTo:'/login'
    });
}]);