/**
 * Created by Kamran on 11/15/2015.
 */

var myApp=angular.module('myApp',[
    'ngRoute',
    'artistControllers'
    ]);

myApp.config(['$routeProvider',function($routeProvider){
$routeProvider.
when('/list', {
    templateUrl: 'partials/list.php',
    controller: 'ListController'
}).
when('/details/:itemId', {
    templateUrl: 'partials/details.php',
    controller: 'DetailsController'
}).
    otherwise({
        redirectTo:'/list'
    });

}]);


