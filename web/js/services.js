/**
 * Created by mudi on 29/09/16.
 */
var services = angular.module('services',['ngResource']);

services.factory('Movies',['$resource','Config',function($resource,Config){
    var movies = $resource(Config.server+'movies/:id',null,{
        save: {
            method: 'POST',
            transformRequest: angular.identity,
            headers:{
                'Content-Type': undefined
            }
        }
    }),
        indexAction = function(){
            return movies.query().$promise;
        },
        deleteAction = function(id){
            return movies.delete({id:id}).$promise;
        },
        createAction = function(movie){
            var fd = new FormData();
            for (var index in movie){
                fd.append(index,movie[index]);
            }
            return movies.save(fd).$promise;
        };

    return {
        indexAction:indexAction,
        deleteAction:deleteAction,
        createAction:createAction
    }
}]);

services.factory('Halls',['$resource','Config',function($resource,Config){
    var halls = $resource(Config.server+'halls/:id',null,null),
        indexAction = function(){
            return halls.query().$promise;
        },
        deleteAction = function(id){
            return halls.delete({id:id}).$promise;
        },
        createAction = function(hall){
            return halls.save(hall).$promise;
        };

    return {
        indexAction:indexAction,
        deleteAction:deleteAction,
        createAction:createAction
    }
}]);

services.factory('GeneralService',['$state',function($state){
    var redirect = function(path, params, options){
        $state.go(path, params, options);
    };
    return{
        redirect:redirect
    }
}]);