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
            $scope.hotProducts.data = $scope.hotProducts.data.splice(0, 2);
        }, function () {
            console.log("error in getting hot products");
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

app.service('UtilityService', ['APIService', function (APIService) {

    this.getCartCount = function (successHandler, errorHandler) {
        APIService.get('/api/cart/count', successHandler, errorHandler);
    };

    this.getHotProducts = function (successHandler, errorHandler) {
        var status = "HOT";
        APIService.get("/api/products/status/" + status + "", successHandler, errorHandler);
    };
}]);