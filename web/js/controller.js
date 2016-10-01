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

controllers.controller('HallsController',['$scope','Halls',function($scope,Halls){
    Halls.indexAction().then(function(response){
        $scope.halls = response;
    },function(err){
        //TODO::handle error
        console.log(err);
    });
    $scope.deleteMovie = function(id,index){
        if(confirm('Are you sure you want to delete ' + $scope.halls[index].name )){
            Halls.deleteAction(id).then(function(response){
                $scope.halls.splice(index, 1);
            },function(err){
                //TODO::handle error
                console.log(err);
            })
        }

    }
}]);

controllers.controller('HallsFormController',['$scope','Halls','GeneralService',function($scope,Halls,GeneralService){
    $scope.createHall = function(hall){
        Halls.createAction(hall).then(function(response){
            console.log(response);
            GeneralService.redirect('halls',null,null);
        },function(err){
            //TODO::handle error
            console.log(err);
        })
    }
}]);

controllers.controller('MoviesHallsController',['$scope','MoviesHalls',function($scope,MoviesHalls){
    MoviesHalls.indexAction().then(function(response){
        $scope.moviesHalls = response;
    },function(err){
        //TODO::handle error
        console.log(err);
    });
    $scope.deleteMovieHall = function(id,index){
        if(confirm('Are you sure you want to delete ' + $scope.moviesHalls[index].movie.title + ' in hall '+ $scope.moviesHalls[index].hall.name)){
            MoviesHalls.deleteAction(id).then(function(response){
                $scope.moviesHalls.splice(index, 1);
            },function(err){
                //TODO::handle error
                console.log(err);
            })
        }

    }
}]);

controllers.controller('MoviesHallsFormController',['$scope','MoviesHalls','GeneralService','Halls','Movies','Shows',function($scope,MoviesHalls,GeneralService,Halls,Movies,Shows){
    Halls.indexAction().then(function(response){
        $scope.halls = response;
    },function(err){
        //TODO::handle error
        console.log(err);
    });
    Movies.indexAction().then(function(response){
        $scope.movies = response;
    },function(err){
        //TODO::handle error
        console.log(err);
    });
    Shows.indexAction().then(function(response){
        $scope.shows = response;
    },function(err){
        //TODO::handle error
        console.log(err);
    });
    $scope.createMovieHall = function(movieHall){
        MoviesHalls.createAction(movieHall).then(function(response){
            console.log(response);
            GeneralService.redirect('movies-halls',null,null);
        },function(err){
            //TODO::handle error
            console.log(err);
        })
    }
}]);