app.controller('SaleController', ['$scope', 'SaleService', function ($scope, SaleService) {

    $scope.sales = [];

    $scope.initialize = function () {
        $scope.getAllSales();
    };

    $scope.getAllSales = function () {
        SaleService.getAllSales(function (response) {
            $scope.sales = response.data;
        }, function (response) {
            console.log("error getting sales");
        });
    };

    $scope.searchByParam = function () {
        SaleService.search($scope.searchParam, function (response) {
            $scope.sales = response.data;
        }, function(response) {
            console.log("error occured while trying to get the searched for products");
        });
    };

    $scope.nextPage = function (url) {
        Pace.restart();
        SaleService.nextPage(url, function (response) {
            $scope.sales = response.data;
        }, function (response) {
            console.log("error occured while getting next page");
        });
    };

    $scope.previousPage = function (url) {
        Pace.restart();
        SaleService.previousPage(url, function (response) {
            $scope.sales = response.data;
        }, function (response) {
            console.log("error occured while getting previous page");
        });
    };

}]);

app.service('SaleService', ['APIService', function (APIService) {

    this.search = function (param, successHandler, errorHandler) {
        APIService.get("/api/sales/search/" + param, successHandler, errorHandler);
    };

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