/**
 * Created by mudi on 29/09/16.
 */
var controllers = angular.module('controllers',[]);

controllers.controller('MainController',['$scope','Users',function($scope,Users){
    $scope.user = Users.getUser();
    $scope.login = function(loginData){
        Users.loginAction(loginData).then(function(response){
            Users.saveUser(response);
            $scope.user = response;
        },function(err){
            //TODO::handle error
            console.log(err);
        });
    };
    $scope.logout = function(){
        Users.logoutAction();
        $scope.user = Users.getUser();
    }
}]);

controllers.controller('MoviesController',['$scope','Movies',function($scope,Movies){
    $scope.selectMovie = false;
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

    };

    $scope.selectMovieFun = function(movie){
        $scope.selectMovie = true;
        console.log(movie);
        $scope.selectedMovie = movie;
    };
    $scope.back = function(){
        $scope.selectMovie = false;
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

controllers.controller('MoviesHallsTicketController',['$scope','$stateParams','MoviesHalls','Tickets','Users',function($scope,$stateParams,MoviesHalls,Tickets,Users){
    console.log($stateParams);

    MoviesHalls.viewAction($stateParams).then(function(response){
        console.log(response);
        $scope.movieHall = response;
        $scope.tickets = response.tickets;
        $scope.rows = [];
        $scope.chairs = [];
        var row=1;
        var ticketsLoop = $scope.tickets.length;
        if(!ticketsLoop){
            ticketsLoop = 1;
        }
        for(var x=1;x<=response.hall.row_chairs*response.hall.row_total;x++){
            var taken = false;
            for(var z=0;z<ticketsLoop;z++) {
                if ($scope.tickets[z]) {
                    if ($scope.tickets[z].chair_number == x && $scope.tickets[z].row_number == row) {
                        console.log('yaah', $scope.tickets[z].chair_number, $scope.tickets[z].row_number, x, row);
                        taken = true;
                    }
                }
            }
            $scope.chairs.push({
                number:x,
                row:row,
                taken:taken
            });
            row = parseInt(x/response.hall.row_chairs)+1;
        }
    },function(err){
        //TODO::handle error
        console.log(err);
    });
    $scope.ticket = function(chair,index){
        var user = Users.getUser();
        if(!user){
            alert('login first please');
            return;
        }
        Tickets.createAction({row:chair.row,chair:chair.number,movieHall:$scope.movieHall.id,user_id:user.id}).then(function(response){
            console.log(response);
            $scope.tickets.push(response);
            $scope.chairs[index].taken = true;
        },function(err){
            //TODO::handle error
            console.log(err);
        })
    }
}]);