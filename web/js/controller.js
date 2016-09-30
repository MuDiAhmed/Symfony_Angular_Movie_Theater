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
        //TODO::handle error
        console.log(err);
    });
    $scope.deleteMovie = function(id,index){
        if(confirm('Are you sure you want to delete ' + $scope.movies[index].title )){
            Movies.deleteAction(id).then(function(response){
                $scope.movies.splice(index, 1);
            },function(err){
                //TODO::handle error
                console.log(err);
            })
        }

    }
}]);
controllers.controller('MoviesFormController',['$scope','Movies','GeneralService',function($scope,Movies,GeneralService){
    $scope.movie = {img:'',title:''};
    $scope.createMovie = function(movie){
        Movies.createAction(movie).then(function(response){
            console.log(response);
            GeneralService.redirect('movies',null,null);
        },function(err){
            //TODO::handle error
            console.log(err);
        })
    }
}]);
