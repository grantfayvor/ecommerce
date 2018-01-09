app.controller('UtilityController', ['$scope', 'UtilityService', function ($scope, UtilityService) {

    $scope.cartCount = 0;

    $scope.initialize = function () {
        $scope.getCartCount();
        $scope.getHotProducts();
    };

    $scope.getCartCount = function () {
        UtilityService.getCartCount(function (response) {
            $scope.cartCount = response.data;
        }, function (response) {
            console.log("error occured while getting count of the cart");
        });
    };

    $scope.getHotProducts = function () {
        UtilityService.getHotProducts(function (response) {
            $scope.hotProducts = response.data;
            $scope.hotProducts.data = shuffle($scope.hotProducts.data);
        }, function () {
            console.log("error in getting hot products");
        });
    };
}]);

app.service('UtilityService', ['APIService', function (APIService) {

    this.getCartCount = function (successHandler, errorHandler) {
        APIService.get('/api/cart/count', successHandler, errorHandler);
    };

    this.getHotProducts = function (successHandler, errorHandler) {
        var status = "HOT";
        APIService.get("/api/products/status/" + status + "", successHandler, errorHandler);
    };
}]);