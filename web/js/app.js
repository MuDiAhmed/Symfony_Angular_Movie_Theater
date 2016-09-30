/**
 * Created by mudi on 29/09/16.
 */
/**
 * Created by mudi on 01/07/16.
 */
var app = angular.module('MyApp',[
    'controllers',
    'ui.router',
    'services',
    'directives'
]);

app.config(['$stateProvider', '$urlRouterProvider',
    function($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('/', {
                abstract: true,
                url: '/movies',
                templateUrl: 'partials/Main.html',
                controller: 'MainController'
            })
            .state('movies', {
                url:'',
                parent:'/',
                templateUrl: 'partials/Movies/index.html',
                controller: 'MoviesController'
            })
            .state('movies-create', {
                url:'/movies/create',
                parent:'/',
                templateUrl: 'partials/Movies/form.html',
                controller: 'MoviesFormController'
            });
        $urlRouterProvider.otherwise('movies');
    }
]);