/**
 * Created by mudi on 29/09/16.
 */
var controllers = angular.module('controllers',[]);

controllers.controller('MainController',['$scope',function($scope){
    $scope.user = {
        name:'Mohamed Ahmed'
    }
}]);

controllers.controller('MoviesController',['$scope','Movies',function($scope,Movies){
    Movies.indexAction().then(function(response){
        $scope.movies = response;
    },function(err){
        console.log(err);
    });
    $scope.deleteMovie = function(id,index){
        Movies.deleteAction(id).then(function(response){
            console.log(response,index);
        },function(err){
            console.log(err);
        })
    }
}]);