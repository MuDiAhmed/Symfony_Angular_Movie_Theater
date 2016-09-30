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
    'directives',
    'ngMessages'
]);

app.config(['$stateProvider', '$urlRouterProvider',
    function($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('/', {
                abstract: true,
                url: '',
                templateUrl: 'partials/Main.html',
                controller: 'MainController'
            })
            .state('movies', {
                url:'/movies',
                parent:'/',
                templateUrl: 'partials/Movies/index.html',
                controller: 'MoviesController'
            })
            .state('movies-create', {
                url:'/movies/create',
                parent:'/',
                templateUrl: 'partials/Movies/form.html',
                controller: 'MoviesFormController'
            })
            .state('halls', {
                url:'/halls',
                parent:'/',
                templateUrl: 'partials/Halls/index.html',
                controller: 'HallsController'
            })
            .state('halls-create', {
                url:'/halls/create',
                parent:'/',
                templateUrl: 'partials/Halls/form.html',
                controller: 'HallsFormController'
            });
        $urlRouterProvider.otherwise('movies');
    }
]);