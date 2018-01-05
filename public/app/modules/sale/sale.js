app.controller('SaleController', ['$scope', 'SaleService', function($scope, SaleService){

    $scope.sales = [];

    $scope.initialize = function(){
        $scope.getAllSales();
    };

    $scope.getAllSales = function(){
        SaleService.getAllSales(function(response){
            $scope.sales = response.data;
        }, function(response){
            console.log("error getting sales");
        });
    };

    $scope.nextPage = function (url) {
        SaleService.nextPage(url, function (response) {
            $scope.sales = response.data;
        }, function (response) {
            console.log("error occured while getting next page");
        });
    };

    $scope.previousPage = function (url) {
        SaleService.previousPage(url, function (response) {
            $scope.sales = response.data;
        }, function (response) {
            console.log("error occured while getting previous page");
        });
    };

}]);

app.service('SaleService', ['APIService', function(APIService){

    this.getAllSales = function (successHandler, errorHandler) {
        APIService.get('/api/sales', successHandler, errorHandler);
    };

    this.nextPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.previousPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };
}]);