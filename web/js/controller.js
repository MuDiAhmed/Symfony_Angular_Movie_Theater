/**
 * Created by mudi on 29/09/16.
 */
var controllers = angular.module('controllers',[]);

controllers.controller('MainController',['$scope',function($scope){
    $scope.user = {
        name:'Mohamed Ahmed'
    }
}]);

controllers.controller('MoviesController',['$scope',function($scope){
    $scope.test = 'hhhh';
    console.log('fdsfgsd');
}]);