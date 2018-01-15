app.controller("CartController", ['$scope', 'CartService', function ($scope, CartService) {

    $scope.cart = [];
    $scope.cartCount = 0;
    $scope.sale = {};

    $scope.initialize = function () {
        $scope.getHotProducts();
        $scope.getCartCount();
        $scope.getUserCart();
        $scope.getAddress();
        $scope.orderId = Math.random().toString(36).replace(/[^a-z0-9]+/g, '').substr(0, 6);
        // console.log($scope.orderId);
    };

    $scope.getHotProducts = function () {
        CartService.getHotProducts(function (response) {
            $scope.hotProducts = response.data;
            $scope.hotProducts.data = shuffle($scope.hotProducts.data);
            $scope.hotProducts.data = $scope.hotProducts.data.splice(0, 2);
        }, function () {
            console.log("error in getting hot products");
        });
    };

    $scope.getUserCart = function () {
        CartService.getUserCart(function (response) {
            $scope.cart = response.data;
            $scope.cart.total_price = parseInt($scope.cart.total_price);
            console.log($scope.cart.data);
        }, function (response, status) {
            console.log("error in getting user cart");
        });
    };

    $scope.submitAddress = function () {
        CartService.submitAddress($scope.sale, function (response) {
            console.log(response.data);
            $('#deliveryAddressModal').modal('show');
            console.log("address was submitted");
        }, function (response) {
            console.log("error occurred while trying to add the address");
        });
    };

    $scope.getAddress = function () {
        CartService.getAddress(function (response) {
            console.log(response.data);
            $scope.sale.deliveryAddress = response.data || '';
        }, function(response) {
            console.log("error occured while trying to get the delivery address");
        });
    };

    $scope.removeFromCart = function (id) {
        Pace.restart();
        CartService.removeFromCart(id, function (response) {
            $scope.cart = response.data;
            $scope.getCartCount();
        }, function (response) {
            console.log("error in removing from cart");
        });
    };

    $scope.getCartCount = function () {
        CartService.getCartCount(function (response) {
            $scope.cartCount = response.data;
        }, function (response) {
            console.log("error occured while getting count of the cart");
        });
    };

    $scope.updateProductInCart = function (rowId, index) {
        Pace.restart();
        if (!$('#quantity_value'+index).val()) {
            return;
        }
        var details = {
            'rowId': rowId,
            'qty': $('#quantity_value'+index).val()
        };
        console.log(details);
        CartService.updateProductInCart(details, function (response) {
            $scope.getCartCount();
            $scope.cart.total_price = response.data.total_price;
            $scope.cart = response.data;
            console.log("product in cart has been updated");
            // console.log(response.data);
        }, function (response) {
            console.log("error occured while updating product in cart");
        });
    };

    var shuffle = function (array) {
        var currentIndex = array.length, temporaryValue, randomIndex;

        // While there remain elements to shuffle...
        while (0 !== currentIndex) {

            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // And swap it with the current element.
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }

        return array;
    };
}]);

app.service("CartService", ['APIService', function (APIService) {
    this.getHotProducts = function (successHandler, errorHandler) {
        var status = "HOT";
        APIService.get("/api/products/status/" + status + "", successHandler, errorHandler);
    };

    this.getUserCart = function (successHandler, errorHandler) {
        APIService.get("/api/cart/user", successHandler, errorHandler);
    };

    this.removeFromCart = function (id, successHandler, errorHandler) {
        APIService.delete("/api/cart/delete/" + id, successHandler, errorHandler);
    };

    this.getCartCount = function (successHandler, errorHandler) {
        APIService.get('/api/cart/count', successHandler, errorHandler);
    };

    this.updateProductInCart = function (details, successHandler, errorHandler) {
        APIService.put('/api/cart/update', details, successHandler, errorHandler);
    };

    this.submitAddress = function (address, successHandler, errorHandler) {
        APIService.post('/api/address/save', address, successHandler, errorHandler);
    };

    this.getAddress = function (successHandler, errorHandler) {
        APIService.get('/api/address', successHandler, errorHandler);
    };
}]);