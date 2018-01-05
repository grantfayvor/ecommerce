app.controller("CartController", ['$scope', 'CartService', function ($scope, CartService) {

    $scope.cart = [];
    $scope.cartCount = 0;

    $scope.initialize = function () {
        $scope.getCartCount();
        $scope.getUserCart();
    };

    $scope.getUserCart = function () {
        CartService.getUserCart(function (response) {
            $scope.cart = response.data;
            console.log($scope.cart.data);
        }, function (response, status) {
            console.log("error in getting user cart");
        });
    };

    $scope.removeFromCart = function (id) {
        CartService.removeFromCart(id, function (response) {
            $scope.cart = response.data;
            $scope.getCartCount();
        }, function (response) {
            console.log("error in removing from cart");
        });
    };

    $scope.getCartCount = function () {
        CartService.getCartCount(function(response){
            $scope.cartCount = response.data;
        }, function(response) {
            console.log("error occured while getting count of the cart");
        });
    };
}]);

app.service("CartService", ['APIService', function (APIService) {
    this.getUserCart = function (successHandler, errorHandler) {
        APIService.get("/api/cart/user", successHandler, errorHandler);
    };

    this.removeFromCart = function (id, successHandler, errorHandler) {
        APIService.delete("/api/cart/delete/" +id, successHandler, errorHandler);
    };

    this.getCartCount = function (successHandler, errorHandler) {
        APIService.get('/api/cart/count', successHandler, errorHandler);
    };
}]);