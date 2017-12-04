var app = angular.module('e-shop', []);

app.config(['$httpProvider', '$interpolateProvider', function ($httpProvider, $interpolateProvider) {

    $interpolateProvider.startSymbol('<%').endSymbol('%>');

    $httpProvider.defaults.headers.common['Accept'] = "application/json";
    $httpProvider.defaults.headers.common['Content-Type'] = "application/json";
    $httpProvider.defaults.useXDomain = true;

}]);