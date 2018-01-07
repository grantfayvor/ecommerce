app.controller('AdminController', ['$scope', 'AdminService', function ($scope, AdminService) {

    $scope.userCount = 0;
    $scope.productCount = 0;

    $scope.initialize = function () {
        $scope.countProducts();
        $scope.countUsers();
        $scope.countSales();
    };

    $scope.countProducts = function () {
        AdminService.countProducts(function (response) {
            $scope.productCount = response.data;
        }, function (response) {
            console.log("error in getting product count");
        });
    };

    $scope.countUsers = function () {
        AdminService.countUsers(function (response) {
            $scope.userCount = response.data;
        }, function (response) {
            console.log("error in getting user count");
        });
    };

    $scope.countSales = function () {
        AdminService.countSales(function(response) {
            $scope.saleCount = response.data;
        }, function(response) {
            console.log("error occured while trying to get the sale count");
        });
    };
    
}]);

app.service('AdminService', ['APIService', function (APIService) {

    this.countUsers = function (successHandler, errorHandler) {
        APIService.get('/api/users/count', successHandler, errorHandler);
    };

    this.countProducts = function (successHandler, errorHandler) {
        APIService.get('/api/products/count', successHandler, errorHandler);
    };

    this.countSales = function (successHandler, errorHandler) {
        APIService.get('/api/sales/count', successHandler, errorHandler);
    };
}]);