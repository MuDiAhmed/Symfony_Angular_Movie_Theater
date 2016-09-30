/**
 * Created by mudi on 29/09/16.
 */
/**
 * Created by mudi on 01/07/16.
 */
var app = angular.module('MyApp',[
    'controllers',
    'ui.router',
    'services'
]);

app.config(['$stateProvider', '$urlRouterProvider',
    function($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('/', {
                abstract: true,
                url: '/',
                templateUrl: 'partials/Main.html',
                controller: 'MainController'
            })
            .state('movies', {
                url:'',
                parent:'/',
                templateUrl: 'partials/Movies.html',
                controller: 'MoviesController'
            });
        $urlRouterProvider.otherwise('/');
    }
]);