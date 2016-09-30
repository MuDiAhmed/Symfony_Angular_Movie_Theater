/**
 * Created by mudi on 29/09/16.
 */
var services = angular.module('services',['ngResource']);

services.factory('Movies',['$resource','Config',function($resource,Config){
    var movies = $resource(Config.server+'movies/:id',null,null),
        indexAction = function(){
            return movies.query().$promise;
        },
        deleteAction = function(id){
            return movies.delete({id:id}).$promise;
        };

    return {
        indexAction:indexAction,
        deleteAction:deleteAction
    }
}]);