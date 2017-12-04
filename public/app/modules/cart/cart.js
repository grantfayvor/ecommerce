app.controller("CartController", ['$scope', 'CartService', function ($scope, CartService) {

    $scope.cart = [];

    $scope.initialize = function () {
        $scope.getUserCart();
    };

    $scope.getUserCart = function () {
        CartService.getUserCart(function (response) {
            $scope.cart = response.data;
        }, function (response, status) {
            console.log("error in getting user cart");
        });
    };

    $scope.removeFromCart = function (id) {
        CartService.removeFromCart(id, function (response) {
            $scope.cart = response.data;
        }, function (response) {
            console.log("error in removing from cart");
        });
    };
}]);

app.service("CartService", ['APIService', function (APIService) {
    this.getUserCart = function (successHandler, errorHandler) {
        APIService.get("/api/cart/user", successHandler, errorHandler);
    };

    this.removeFromCart = function (id, successHandler, errorHandler) {
        APIService.delete("/api/cart/remove/" +id, successHandler, errorHandler);
    }
}]);